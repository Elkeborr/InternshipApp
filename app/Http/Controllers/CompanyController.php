<?php

namespace App\Http\Controllers;

class CompanyController extends Controller
{
    public function index()
    {
        $data['companies'] = \DB::table('companies')->get();

        return view('companies/index', $data);
    }
}
