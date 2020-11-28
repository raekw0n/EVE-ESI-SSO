@extends('layouts.app')

@section('additional_styles')
    @parent
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
                @if(!empty($finances['ledger']))
                    @foreach($finances['ledger'] as $division)
                        <div class="col-12 col-sm-6 col-md-4 mt-3">
                            <div class="card bg-dark filter shadow">
                                <div class="card-body">
                                    <h5>{{ $division->name }}</h5>
                                    <span class="{{ $division->balance > 25000000 ? 'text-success' : 'text-danger' }}">{{ number_format($division->balance, 0) }} ISK</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @include('partials.management.contracts')
            <div class="row mt-3"></div>
        </div>
    </div>
@endsection

@section('additional_scripts')
@endsection
