@extends('layouts.app')

@section('additional_styles')
    <style>
        select#division-filter {
            width: 160px;
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <div id="finances">
        <div class="container py-2">
            <div class="row mt-3">
                <div class="col-12">
                    <h1>{{ config('app.name') }} Finances</h1>
                </div>
            </div>
            <hr>
            @include('partials.management.balances')
            <div class="row mt-4">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <h2>Corporate Ledger</h2>
                    <small class="text-muted">(Outstanding: {{ 1 }})</small>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card p-2 bg-white shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 pb-4 d-flex align-items-center justify-content-between">
                                    <form action="{{ route('corporate.finances.update') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-secondary" type="submit" id="update_finances">Update Ledger</button>
                                    </form>
                                </div>
                            </div>
                            <table id="corporate_finances" class="table table-sm table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ESI ID</th>
                                    <th scope="col">Division</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Balance</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($finances['journal'] as $row)
                                        <tr class="{{ set_positive_negative_alert_level($row->amount) }}">
                                            <td>{{ $row->journal_id }}</td>
                                            <td>{{ $row->division->division_name }}</td>
                                            <td>
                                                <span class="tool" data-tip="{{ $row->description }}">
                                                    {{ ucwords(str_replace("_", " ", $row->ref_type)) }}
                                                </span>
                                            </td>
                                            <td>{{ date('jS M H:i:s', strtotime($row->created_at)) }}</td>
                                            <td>{{ number_format($row->amount, 2) }} ISK</td>
                                            <td>{{ number_format($row->balance, 2) }} ISK</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script>
        $(document).ready(() => {
            $.fn.dataTable.ext.search.push((settings, data) => {
                    let status = $('#division-filter option:selected').val();
                    let col = data[1].toLowerCase().replace(" ", "_");

                    if (status === col || status === 'all' || status === undefined) {
                        return data;
                    }
                }
            );

            let table = $('#corporate_finances').DataTable({
                order: [[ 3, "desc" ]]
            });

            // TODO remove hard-coded divisions
            let filter = '<label class="ml-3">Division: ' +
                '             <select class="form-control form-control-sm" name="division-filter" id="division-filter">\n' +
                '                 <option value="all" selected></option>\n' +
                '                 <option value="collateral_fund">Collateral Fund</option>\n' +
                '                 <option value="srp_fund">SRP Fund</option>\n' +
                '                 <option value="rent_fund">Rent Fund</option>\n' +
                '                 <option value="industry_fund">Industry Fund</option>\n' +
                '                 <option value="agreements">Agreements</option>\n' +
                '                 <option value="profits">Profits</option>\n' +
                '             </select>' +
                '         </label>';

            $('#corporate_finances_filter').append(filter);

            $('#division-filter').change(() => {
                table.draw();
            });
        })
    </script>
@endsection

