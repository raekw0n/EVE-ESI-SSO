@extends('layouts.app')

@section('additional_styles')
@endsection

@section('content')
    <div id="contracts">
        <div class="container py-4">
            @include('partials.management.contracts')
        </div>
    </div>
@endsection

@section('additional_scripts')
@endsection
