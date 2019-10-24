<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class CompanyController extends Controller
{
    public function register(Request $request)
    {
        return view('companies/register');
    }

    public function handleRegister(Request $request)
    {
        $validation = $request->validate([
              'email' => ['unique:users,email'],
              'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);

        $request->flash();
        $company = new \App\User();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->password = \Hash::make($request->input('password'));
        $company->type = 'company';
        $company->save();

        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $request->session()->flash('username', $company->name);
            $request->session()->flash('message', 'Company registration successful!');

            return redirect('home');
        }

        return view('companies/login');
    }

    public function login()
    {
        return view('companies/login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $request->flash();
        if (Auth::attempt($credentials)) {
            $request->session()->flash('message', 'Login successful!');

            //Retrieve data and put it in session
            $user_id = Auth::id();
            $user = \App\User::where('id', $user_id)->select('id', 'name', 'email', 'type', 'company_id')->first();
            //Put user data in session User
            $request->session()->put('user', $user);
            // dd($sessionData['name']);
            return redirect('home');
        }
        $request->session()->flash('message', 'Login Failed, try again');

        return view('companies/login');
    }

    public function index()
    {
        $data['companies'] = \DB::table('companies')->get();

        return view('companies/index', $data);
    }

    public function show($company)
    {
        $data['company'] = \App\Company::where('id', $company)->with('reviews')->first();

        return view('companies/show', $data);
    }

    public function showMyInternships()
    {
        $user = session('user');
        $data['myinternships'] = \DB::table('internships')->where('company_id', $user->company_id)->get();

        return view('companies/myInternships', $data);
    }

    public function create()
    {
        return view('companies/create');
    }

    public function store(Request $request)
    {
        $user = session('user');
        $internship = new \App\Internship();

        $internship->internship_function = $request->input('internshipFunction');
        $internship->internship_discription = $request->input('discription');
        $internship->available_spots = $request->input('spots');
        $internship->company_id = $user->company_id;

        $internship->save();

        return redirect('companies/myinternships');
    }
}
