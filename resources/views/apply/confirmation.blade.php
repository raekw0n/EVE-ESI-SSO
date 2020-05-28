@extends('layouts.app')

@section('additional_styles')
@endsection

@section('content')
    <div id="application">
        <div class="container py-4">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card filter">
                        <div class="card-header">
                            Application Received!
                        </div>
                        <div class="card-body">
                            <p>
                                Success! your application has been received. Please keep an eye on your EVEmail,
                                we'll send you an invite or an update shortly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
@endsection
