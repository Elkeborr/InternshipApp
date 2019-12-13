<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        $data['internships'] = \App\Internship::with('jobApplications')->get();
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        return view('internships/index', $data);
    }

    public function show($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->with('company')->first();
        $data['jobApplications'] = \App\JobApplication::where('internship_id', $internship)->where('user_id', \Auth::user()->id)->get();

        return view('internships/show', $data);
    }

    public function welcomeIndex()
    {
        $data['internships'] = \App\Internship::with('jobApplications')->take(6)->latest()->get();
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        return view('welcome', $data);
    }

    public function showMyInternships()
    {
        $data['myinternships'] = \App\Internship::where('company_id', \Auth::user()->company_id)->get();

        return view('internships/myInternships', $data);
    }

    public function create()
    {
        return view('internships/create');
    }

    public function handleCreate(Request $request)
    {
        $this->validate($request, [
            'internshipFunction' => 'required',
            'discription' => 'required',
            'spots' => 'required|gt:0',
        ]);

        $user = \Auth::user();
        $internship = new \App\Internship();

        $internship->internship_function = $request->input('internshipFunction');
        $internship->internship_discription = $request->input('discription');
        $internship->available_spots = $request->input('spots');
        $internship->company_id = $user->company_id;

        $internship->save();

        return redirect('internships/myinternships');
    }
}
