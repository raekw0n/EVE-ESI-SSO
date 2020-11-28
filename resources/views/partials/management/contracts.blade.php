@section('additional_styles')
    @parent
    <style>
        select#status-filter {
            width: 160px;
            display: inline-block;
        }
    </style>
@endsection

<div class="row mt-4">
    <div class="col-12 d-flex align-items-center justify-content-between">
        <h2>Courier Contracts</h2>
        <small class="text-muted">(Outstanding: {{ 1 }})</small>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card p-2 bg-white shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 pb-4 d-flex align-items-center justify-content-between">
                        <form action="{{ route('corporate.contracts.update') }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-secondary" type="submit" id="update_contracts">Update Contracts</button>
                        </form>
                    </div>
                </div>
                <table id="corporate_contracts" class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">ESI ID</th>
                        <th scope="col">Volume</th>
                        <th scope="col">Collateral</th>
                        <th scope="col">Reward</th>
                        <th scope="col">Issued On</th>
                        <th scope="col">Expires On</th>
                        <th scope="col">Completed On</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contracts as $contract)
                        <tr class="{{ set_status_alert_level($contract->status) }}">
                            <td>{{ $contract->esi_contract_id }}</td>
                            <td>{{ number_format($contract->volume, 2) }}<sub>m3</sub></td>
                            <td>{{ number_format($contract->collateral, 2) }} ISK</td>
                            <td>{{ number_format($contract->reward, 2) }} ISK</td>
                            <td>{{ date('jS M H:i:s', strtotime($contract->date_issued)) }}</td>
                            <td>{{ date('jS M H:i:s', strtotime($contract->date_expires)) }}</td>
                            <td>{{ $contract->date_completed
                                   ? date('jS M H:i:s', strtotime($contract->date_completed))
                                   : set_completed_on_text($contract->status) }}
                            </td>
                            <td>{{ ucwords(str_replace("_", " ", $contract->status)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('partials.alert')

@section('additional_scripts')
    @parent
    <script>
        $(document).ready(() => {
            $.fn.dataTable.ext.search.push((settings, data) => {
                    let status = $('#status-filter option:selected').val();
                    let col = data[7].toLowerCase().replace(" ", "_");

                    if (status === col || status === 'all' || status === undefined) {
                        return data;
                    }
                }
            );

            let table = $('#corporate_contracts').DataTable({
                order: [[ 6, "desc" ]]
            });

            let filter = '<label class="ml-3">Filter by status: ' +
                '             <select class="form-control form-control-sm" name="status-filter" id="status-filter">\n' +
                '                 <option value="all" selected></option>\n' +
                '                 <option value="failed">Failed</option>\n' +
                '                 <option value="finished">Finished</option>\n' +
                '                 <option value="in_progress">In Progress</option>\n' +
                '                 <option value="outstanding">Outstanding</option>\n' +
                '             </select>' +
                '         </label>';

            $('#corporate_contracts_filter').append(filter);

            $('#status-filter').change(() => {
                table.draw();
            });
        })
    </script>
@endsection
