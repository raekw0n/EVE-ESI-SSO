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
            @include('partials.management.balances')
            @include('partials.management.contracts')
            <div class="row mt-3"></div>
        </div>
    </div>
@endsection

@section('additional_scripts')
@endsection
