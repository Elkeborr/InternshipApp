<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jobApplicationController extends Controller
{
    public function apply(\App\Internship $internship, Request $request)
    {
        $student = \Auth::user();

        $check = \App\JobApplication::
            where('internship_id', $internship->id)
            ->where('user_id', $student->id)
            ->exists();

        if ($check == null) {
            if ($internship->available_spots > 0) {
                $application = new \App\JobApplication();
                $application->internship_id = $internship->id;
                $application->user_id = $student->id;
                $application->status = 'new';
                $application->save();

                // $spots = new \App\Internship();
                // $spots->decrement('available_spots');
            }
        }

        $data = \App\Company::with('internships')->where('id', '=', $internship->company_id)->first();
        $companyName = $data->name;
        $request->session()->flash('message', "Je hebt succesvol gesoliciteerd voor  '$internship->internship_function' bij $companyName");

        return redirect('/internships');
    }

    public function applications($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->first();
        $data['messagesCompany'] = \App\Message::where('company_id', \Auth::user()->company_id)->first();
        $internships = \App\Internship::where('id', $internship)->first();
        $jobApplications = $internships->jobApplications;

        foreach ($jobApplications as $jobApplication) {
            if ($jobApplication->status == 'new') {
                $data['new'] = true;
            }
        }

        return view('internships/applications', $data);
    }

    public function save(Request $request, $id)
    {
        $data = \App\JobApplication::where('id', $id)->first();
        $data->status = $request->status;

        if ($request->status == 'approved') {
            $internshipId = $data->internship_id;
            $spots = \App\Internship::where('id', $internshipId)->first();
            if ($spots->available_spots == 0) {
                $request->session()->flash('message', 'Er zijn geen plaatsen meer vrij');
            }
            $newSpots = $spots->available_spots - 1;
            $spots->available_spots = $newSpots;
            $spots->save();
        }
        $data->save();

        return redirect()->back();
    }

    public function seen()
    {
        $user = \Auth::user();
        $internships = \App\Internship::where('company_id', $user->company_id)->get();

        foreach ($internships as $internship) {
            foreach ($internship->jobApplications as $jobApplication) {
                if ($jobApplication->status == 'new') {
                    $jobApplication->status = 'starred';
                    $jobApplication->save();
                }
            }
        }

        return redirect()->back();
    }
}
