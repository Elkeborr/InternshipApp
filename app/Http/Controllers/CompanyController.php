<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CompanyController extends Controller
{
    public function register()
    {
        return view('companies/register');
    }

    public function handleRegister(Request $request)
    {
        $validation = $request->validate([
              'email' => ['unique:companies,email'],
              'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);
        $request->flash();
        $company = new \App\Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->street = $request->input('street');
        $company->streetNumber = $request->input('streetNumber');
        $company->city = $request->input('city');
        $company->employees = '';
        $company->bio = '';
        $company->phoneNumber = '';
        $company->postalCode = $request->input('postalCode');
        $company->type = 'company';
        $company->password = \Hash::make($request->input('password'));
        $company->save();

        $request->session()->flash('message', 'Company registration successful!');

        return redirect('home');
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
}
