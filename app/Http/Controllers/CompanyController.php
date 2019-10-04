<?php

namespace App\Http\Controllers;

class CompanyController extends Controller
{
    public function index()
    {
        $data['companies'] = \DB::table('companies')->get();

        return view('companies/index', $data);
    }

    public function show($company)
    {
        $data['company'] = \App\Company::where('id', $company)->first();

        return view('companies/show', $data);
    }
}
