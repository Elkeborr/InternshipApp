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
        $request->session()->flash('message', "You successfully applied for the job '$internship->internship_function' at $companyName");

        return redirect('/internships');
    }

    public function applications($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->first();

        return view('internships/applications', $data);
    }

    public function save(Request $request, $id)
    {
        $data = \App\JobApplication::where('id', $id)->first();
        $data->status = $request->status;
        $data->save();

        if ($request->status == 'approved') {
            $spots = \App\Internship::where('id', $id);
            $spots->decrement('available_spots');
        }

        return redirect()->back();
    }
}
