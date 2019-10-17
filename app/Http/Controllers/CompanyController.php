<?php

namespace App\Http\Controllers;

use Illuminate\http\request;

class CompanyController extends Controller
{
    /* public function create()
     {
         return view('register/index');
     }*/

    /*  public function store(Request  $request)
      {
          $company = new \app\Company();
          $company->name = $request->input('name');
          $company->email = $request->input('email');
          $company->password = $request->input('password');
          $company->save();

          return redirect('/companies');
      }*/

    public function register()
    {
        return view('companies/register');
    }

    public function handleRegister(Request $request)
    {
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

        return view('companies/register');
    }

    public function login()
    {
        return view('companies/login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (\Auth::attempt($credentials)) {
            return view('companies/login');
        }
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
