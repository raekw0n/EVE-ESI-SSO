@extends('layouts.app')

@section('additional_styles')
@endsection

@section('content')
    <div id="management">
        <div class="container py-2">
            <div class="row mt-3">
                <div class="col-12">
                    <h1>{{ config('app.name') }} Management</h1>
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <h2>Corporate Balances</h2>
                    <small class="text-muted">(Total: {{ number_format($finances['total'], 2) }} ISK)</small>
                </div>
            </div>
            <div class="row text-light">
                @foreach($finances['divisions'] as $division)
                    <div class="col-12 col-sm-6 col-md-3 mt-3">
                        <div class="card bg-dark filter shadow">
                            <div class="card-body">
                                <h5>{{ $division->name }}</h5>
                                <span class="{{ $division->balance > 25000000 ? 'text-success' : 'text-danger' }}"></span>{{ number_format($division->balance, 0) }} ISK
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card bg-white shadow border-0">
                        <div class="card-header bg-white">
                            <h2>Haulage Contracts</h2>
                        </div>
                        <div class="card-body">
                            <table id="corporate_contracts" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">ESI ID</th>
                                        <th scope="col">Volume</th>
                                        <th scope="col">Collateral</th>
                                        <th scope="col">Reward</th>
                                        <th scope="col">Date Issued</th>
                                        <th scope="col">Date Accepted</th>
                                        <th scope="col">Date Completed</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contracts as $contract)
                                        <tr class="{{ $contract->status === 'finished' ? 'alert-success' : 'alert-warning' }}">
                                            <td>{{ $contract->esi_contract_id }}</td>
                                            <td>{{ number_format($contract->volume, 2) }}<sub>m3</sub></td>
                                            <td>{{ number_format($contract->collateral, 2) }} ISK</td>
                                            <td>{{ number_format($contract->reward, 2) }} ISK</td>
                                            <td>{{ date('jS M H:i:s', strtotime($contract->date_issued)) }}</td>
                                            <td>{{ $contract->date_accepted ? date('jS M H:i:s', strtotime($contract->date_accepted)) : 'TBC' }}</td>
                                            <td>{{ $contract->date_completed ? date('jS M H:i:s', strtotime($contract->date_completed)) : 'TBC' }}</td>
                                            <td>{{ ucwords(str_replace("_", " ", $contract->status)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3"></div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script>
        $(document).ready(function() {
            $('#corporate_contracts').DataTable({
                "order": [[ 6, "desc" ]]
            });
        })
    </script>
@endsection
