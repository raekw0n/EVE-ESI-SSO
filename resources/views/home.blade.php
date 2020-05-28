@extends('layouts.app')

@section('additional_styles')
@endsection

@section('content')
    <div id="introduction">
        <div class="container-fluid text-light">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron bg-none">
                        <h1>
                            Welcome to Mesa Orbital
                        </h1>
                        <p class="font-big">
                            We're a high-security industry & logistics corporation operating in New Eden.
                        </p>
                        <p>
                            <a class="btn btn-outline-light btn-large" href="{{ route('apply') }}">Apply to Join<i class="ml-1 fas fa-arrow-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="row text-center mt-2">
            <div class="col-md-4">
                <h2>
                    Haulage
                </h2>
                <p>
                    We'll safely haul your stuff all the way across empire space for a fraction of the price offered by
                    leading logistics corporations. We are also extending this service to null-security space as we
                    negotiate more contracts with sov-holding alliances.
                </p>
                <p>
                    <a class="btn btn-outline-dark" href="{{ route('haulage') }}">FAQs / Get a quote »</a>
                </p>
            </div>
            <div class="col-md-4">
                <h2>
                    Reprocessing
                </h2>
                <p>
                    Feel free to use our freeport reprocessing facility - Mesa Orbital Logistics Facility - located in the
                    Nonni system which is conveniently placed just 5 jumps away from Jita. More facilities will be
                    popping up in the near future, all with 0% tax, so watch this space.
                </p>
                <p>
                    <a class="btn btn-outline-dark" href="{{ route('reprocessing') }}">FAQs / Get a quote »</a>
                </p>
            </div>
            <div class="col-md-4">
                <h2>
                    Manufacturing
                </h2>
                <p>
                    Feel free to also use our facility for your manufacturing needs, there is 0% tax on all
                    manufacturing jobs and our main facility is again located in Nonni so you'll have no problem
                    transporting your goods to Jita to sell for profit.
                </p>
                <p>
                    <a class="btn btn-outline-dark" href="{{ route('manufacturing') }}">FAQs / Get a quote »</a>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            @if(session('logged_in'))
                Toast.fire({
                    icon: 'success',
                    title: "Character successfully authenticated."
                });
            @endif()
        });
    </script>
@endsection
