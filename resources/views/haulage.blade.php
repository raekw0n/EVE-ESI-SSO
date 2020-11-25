@extends('layouts.app')

@section('additional_styles')
@endsection

@section('content')
    <div id="haulage" class="eve-bg">
        <div class="container py-4 text-light">
            <div class="row mt-3">
                <div class="col-12">
                    <h1>We'll haul your stuff across the galaxy!</h1>
                </div>
            </div>
        </div>
        <div class="container pb-4 text-light">
            <div class="card bg-dark filter">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h2>FAQs</h2>
                            <strong class="font-big">Do you ship to/from nullsec?</strong>
                            <p>
                                We currently only ship to nullsec NPC systems, however we are currently working to secure
                                agreements with alliances to allow us to operate services in more sov space.
                            </p>
                            <strong class="font-big">Why should I use Allsides?</strong>
                            <p>
                                We're cheaper and more efficient than current leading freight service providers due to having no backlog. We do this mainly because
                                we enjoy space trucking, it's our passion and profit comes second.
                            </p>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <h2>Quote</h2>
                            @include('partials.calculators.haulage')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
@endsection
