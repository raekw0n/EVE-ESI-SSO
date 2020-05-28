@extends('layouts.app')

@section('additional_styles')
@endsection

@section('content')
    <div id="application">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card filter">
                        <div class="card-header font-bigger">
                          Apply to Join Mesa Orbital
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ route('apply.submit') }}">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="length_playing">How long have you been playing EVE for?</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" id="length_playing" name="length_playing"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="favourite_activities">What are your favourite activities in EVE?</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" id="favourite_activities" name="favourite_activities"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="reason_joining">Why do you want to join Mesa Orbital?</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" id="reason_joining" name="reason_joining"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="real_life">Share a bit about yourself, such as what you do for a living, hobbies etc. (optional)</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" id="real_life" name="real_life"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="haiku">Write a haiku</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" id="haiku" name="haiku"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button class="btn btn-outline-light">Submit Application</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
@endsection
