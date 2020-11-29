<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Illuminate\Http\Request;
use Mesa\Application;

class ApplicationsController extends BaseController
{
    public function index()
    {
        $applications = Application::all();

        return view('management.applications', compact('applications'));
    }

    public function view(Application $applicant)
    {
        $applicant->character_raw_data = json_decode($applicant->character_raw_data);
//        dd($applicant->character_raw_data->corporation_history);
        return view('management.application', compact('applicant'));
    }

    public function decideApplication(Application $applicant, Request $request)
    {
        $applicant->status = $request->status;
        $applicant->save();

        redirect()->route('corporate.applications');
    }
}
