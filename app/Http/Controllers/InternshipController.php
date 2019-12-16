<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        $data['internships'] = \App\Internship::where('status', true)->with('jobApplications')->orderBy('created_at', 'DESC')->get();
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        return view('internships/index', $data);
    }

    public function show($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->with('company')->where('status', true)->first();
        $data['jobApplications'] = \App\JobApplication::where('internship_id', $internship)->where('user_id', \Auth::user()->id)->get();
        $data['like'] = \App\Like::where('internship_id', $internship)->where('user_id', \Auth::user()->id)->get();

        return view('internships/show', $data);
    }

    public function welcomeIndex()
    {
        $data['internships'] = \App\Internship::with('jobApplications')->where('status', true)->take(6)->latest()->get();
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        return view('welcome', $data);
    }

    public function showMyInternships()
    {
        $data['myinternships'] = \App\Internship::where('company_id', \Auth::user()->company_id)->where('status', true)->get();

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
        $internship->internship_profile = $request->input('profile');
        $internship->available_spots = $request->input('spots');
        $internship->education_level = $request->input('education');
        $internship->languages = $request->input('languages');
        $internship->drivers_license = $request->input('driver_license');
        $internship->remarks = $request->input('remarks');
        $internship->paid = $request->input('paid');
        $internship->status = true;
        $internship->company_id = $user->company_id;

        $internship->save();

        return redirect('internships/myinternships');
    }

    public function edit($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->first();

        return view('/Internships/editMyInternship', $data);
    }

    public function handleEdit(Request $request)
    {
        $internship_id = $request->route('internship');
        $internship = \App\Internship::where('id', $internship_id)
            ->first();

        $internship->internship_function = $request->input('internshipFunction');
        $internship->internship_discription = $request->input('discription');
        $internship->internship_profile = $request->input('profile');
        $internship->available_spots = $request->input('spots');
        $internship->education_level = $request->input('education');
        $internship->languages = $request->input('languages');
        $internship->drivers_license = $request->input('driver_license');
        $internship->remarks = $request->input('remarks');
        $internship->paid = $request->input('paid');
        $internship->status = true;
        $internship->save();

        return redirect()->action('InternshipController@show', $internship);
    }

    public function delete(Request $request)
    {
        if ($request['delete']) {
            $internship_id = $request->route('internship');
            $internship = \App\Internship::where('id', $internship_id)
                ->first();

            $internship->status = false;
            $internship->save();

            return redirect()->back();
        }
    }
}
