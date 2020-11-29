@extends('layouts.app')

@section('additional_styles')
@endsection

@section('content')
    <div id="order-history">
        <div class="container py-2">
            <div class="row mt-3">
                <div class="col-12">
                    <h1>{{ config('app.name') }} Order Management</h1>
                </div>
            </div>
            <hr>
            @include('partials.management.balances')
            @include('partials.management.orders')
        </div>
    </div>
@endsection

@section('additional_scripts')
@endsection
