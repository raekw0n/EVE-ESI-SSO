@section('additional_styles')
    <style>
        select#order-division-filter {
            width: 160px;
            display: inline-block;
        }
    </style>
@endsection

<div class="row mt-4">
    <div class="col-12 d-flex align-items-center justify-content-between">
        <h2>Order History</h2>
        <small class="text-muted">(Total: {{ 173 }})</small>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card p-2 bg-white shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 pb-4 d-flex align-items-center justify-content-between">
                        <form action="{{ route('corporate.orders.update') }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-secondary" type="submit" id="update_orders">Update History</button>
                        </form>
                    </div>
                </div>
                <table id="corporate_orders" class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">ESI ID</th>
                        <th scope="col">Division</th>
                        <th scope="col">Buy/Sell</th>
                        <th scope="col">Item</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total Volume</th>
                        <th scope="col">Created On</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($finances['orders'] as $row)
                        <tr class="{{set_positive_negative_alert_level($row->is_buy_order===1?'Buy':'Sell')}}">
                            <td>{{ $row->order_id }}</td>
                            <td>{{ $row->division->division_name ?? 'N/A' }}</td>
                            <td>{{ $row->is_buy_order === 1 ? 'Buy' : 'Sell' }}</td>
                            <td>{{ $row->type_id }}</td>
                            <td>{{ number_format($row->price, 2) }} ISK</td>
                            <td>{{ $row->volume_total }}</td>
                            <td>{{ date('jS M H:i:s', strtotime($row->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('additional_scripts')
    @parent
    <script>
        $(document).ready(() => {
            $.fn.dataTable.ext.search.push((settings, data) => {
                    let status = $('#order-division-filter option:selected').val();
                    let col = data[1].toLowerCase().replace(" ", "_");

                    if (status === col || status === 'all' || status === undefined) {
                        return data;
                    }
                }
            );

            let table = $('#corporate_orders').DataTable({
                order: [[ 6, "desc" ]]
            });

            // TODO remove hard-coded divisions
            let filter = '<label class="ml-3">Division: ' +
                '             <select class="form-control form-control-sm" name="order-division-filter" id="order-division-filter">\n' +
                '                 <option value="all" selected></option>\n' +
                '                 <option value="collateral_fund">Collateral Fund</option>\n' +
                '                 <option value="srp_fund">SRP Fund</option>\n' +
                '                 <option value="rent_fund">Rent Fund</option>\n' +
                '                 <option value="industry_fund">Industry Fund</option>\n' +
                '                 <option value="agreements">Agreements</option>\n' +
                '                 <option value="profits">Profits</option>\n' +
                '             </select>' +
                '         </label>';

            $('#corporate_orders_filter').append(filter);

            $('#order-division-filter').change(() => {
                table.draw();
            });
        })
    </script>
@endsection
