@extends('layouts.app')

@section('additional_styles')
@endsection

@section('content')
    <div id="application">
        <div class="container py-4 text-light">
            <div class="row mt-3">
                <div class="col-md-12">
                    <h1>We'll haul your stuff across the galaxy...</h1>
                </div>
            </div>
        </div>
        <div class="container py-4 text-light">
            <div class="card filter">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>FAQs</h2>
                            <hr>
                            <strong class="font-big">Do you ship to/from nullsec?</strong>
                            <p>
                                Not yet, however we are currently negotiating with alliances to gain access and will be
                                able to offer this service shortly.
                            </p>
                            <strong class="font-big">Why should I use you instead of PushX of Red Frog?</strong>
                            <p>
                                We're cheaper and more efficient than current leading freight service providers, plus
                                it's always nice to help a new corporation grow!
                            </p>
                            <strong class="font-big">Lorem ipsum dolor sit amet?</strong>
                            <p>Tema tis rolod muspi merol.</p>
                            <strong class="font-big">Lorem ipsum dolor sit amet?</strong>
                            <p>Tema tis rolod muspi merol.</p>
                            <strong class="font-big">Lorem ipsum dolor sit amet?</strong>
                            <p>Tema tis rolod muspi merol.</p>
                        </div>
                        <div class="col-md-6">
                            <h2>Quote</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
@endsection
