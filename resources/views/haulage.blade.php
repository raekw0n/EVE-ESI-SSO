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
                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-6">
                            <h2>Instructions</h2>
                            <ol>
                                <li>Use the calculator to determine the reward amount.</li>
                                <li>
                                    Get your goods valued at <a href="https://evepraisal.com">Evepraisal</a>
                                    and use the <strong>estimated sell value</strong> as the collateral amount.
                                </li>
                                <li>
                                    Create the contract as <strong>private</strong> and issue it to
                                    <strong>Allsides Neutral Logistics</strong>.
                                </li>
                                <li>
                                    For rush delivery, set the expiration to <strong>3 days</strong>, for normal service,
                                    set the expiration to <strong>7 days</strong>.
                                </li>
                                <li>
                                    Set days to complete to <strong>3 days</strong>.
                                </li>
                                <li>
                                    Sit back and relax, your goods will be delivered in no time!
                                </li>
                            </ol>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <h2>Quote</h2>
                            @include('partials.calculators.haulage')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
@endsection
