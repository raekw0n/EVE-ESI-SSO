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
                <div class="pb-4 text-right">
                    <form action="{{ route('corporate.contracts.update') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-secondary" type="submit" id="update_contracts">Update Contracts</button>
                    </form>
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
                        <tr class="{{ $contract->status === 'finished' ? 'alert-success' : 'alert-warning' }}">
                            <td>{{ $contract->esi_contract_id }}</td>
                            <td>{{ number_format($contract->volume, 2) }}<sub>m3</sub></td>
                            <td>{{ number_format($contract->collateral, 2) }} ISK</td>
                            <td>{{ number_format($contract->reward, 2) }} ISK</td>
                            <td>{{ date('jS M H:i:s', strtotime($contract->date_issued)) }}</td>
                            <td>{{ date('jS M H:i:s', strtotime($contract->date_expires)) }}</td>
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
@include('partials.alert')
@section('additional_scripts')
    @parent
    <script>
        $(document).ready(function() {
            $('#corporate_contracts').DataTable({
                order: [[ 6, "desc" ]]
            });
        })
    </script>
@endsection
