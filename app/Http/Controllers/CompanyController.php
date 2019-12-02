<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use GuzzleHttp\Client;

class CompanyController extends Controller
{
    public function register(Request $request)
    {
        return view('companies/register');
    }

    public function handleRegister(Request $request)
    {
        $validation = $request->validate([
              'email' => ['unique:users', 'email'],
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
            $request->session()->flash('message', 'Bedrijfs registratie succesvol!');
            $request->session()->flash('email', $company->email);
            //Retrieve data and put it in session
            $user_id = Auth::id();
            $user = \App\User::where('id', $user_id)->select('id', 'name', 'email', 'type', 'company_id')->first();
            //Put user data in session User
            $request->session()->put('user', $user);
            // dd($sessionData['name']);

            return redirect('companies/detail');
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
            $request->session()->flash('message', 'Login successvol!');

            //Retrieve data and put it in session
            $user_id = Auth::id();
            $user = \App\User::where('id', $user_id)->select('id', 'name', 'email', 'type', 'company_id')->first();

            if ($user->type == 'company') {
                //Put user data in session User
                $request->session()->put('user', $user);
                // dd($sessionData['name']);
                return redirect('home');
            }
            $request->session()->flash('message', 'Hier kunnen enkel bedrijven inloggen');

            return view('companies/login');
        }
        $request->session()->flash('message', 'Login lukt niet, probeer opnieuw');

        return view('companies/login');
    }

    public function index()
    {
        if (Auth::check()) {
            $data['companies'] = \App\Company::get();
            $data['tags'] = \App\CompanyTag::get();

            return view('companies/index', $data);
        }

        return redirect('companies/login');
    }

    public function show($company)
    {
        if (Auth::check()) {
            $data['internships'] = \App\Internship::where('company_id', $company)->get();

            $data['company'] = \App\Company::where('id', $company)
                ->with('reviews')
                ->with('tags')
                ->first();

            $data['tags'] = \App\AssignCompanyTags::where('id', $company)
                ->with('tags')->first();

            $data['reviews'] = \App\Review::where('id', $company)
                ->with('users')
                ->first();

            //dd($data['tags']);

            return view('companies/show', $data);
        }

        return redirect('companies/login');
    }

    public function create()
    {
        $user = session('user');
        $query = $user->name;
        $client_id = env('FOURSQUARE_CLIENT_ID');
        $secret = env('FOURSQUARE_SECRET');
        $version = env('FOURSQUARE_VERSION');

        $client = new Client([
            'client_id' => $client_id,
            'client_secret' => $secret,
            'version' => $version,
            'base_uri' => 'https://api.foursquare.com/v2/venues/search',
        ]);

        $response = $client->get('?query='.$query.'&near=belgium&client_id='.$client_id.'&client_secret='.$secret.'&v='.$version.'');

        $res = json_decode($response->getBody(), true);
        $data['company'] = $res['response']['venues']['0'];
        $data['user'] = $user;
        $data['tags'] = \App\CompanyTag::get();

        return view('companies/detail', $data);
    }

    public function handlecreate(Request $request)
    {
        $user = session('user');
        $company = new \App\Company();

        $company->name = $request->input('name');
        $company->bio = $request->input('bio');
        $company->phoneNumber = $request->input('phoneNumber');
        $company->email = $request->input('email');
        $company->street = $request->input('street');
        $company->streetNumber = $request->input('streetNumber');
        $company->city = $request->input('city');
        $company->state = $request->input('state');
        $company->postalCode = $request->input('postalCode');
        $company->employees = $request->input('employees');
        $company->user_id = $user->id;
        $saved = $company->save();

        $tags = $request->input('tag');
        foreach ($tags as $tag) {
            $newtag = new \App\AssignCompanytags();
            $newtag->company_id = $company->id;
            $newtag->company_tag_id = json_decode($tag);
            $savedTags = $newtag->save();
        }

        $company = \App\User::where('id', '=', $user->id)
            ->update(['company_id' => $company->id]);

        if ($saved && $savedTags && $company) {
            $request->session()->flash('message', 'Welkom op je startpagina');

            return redirect('home');
        }
        $request->session()->flash('message', 'Oeps, er is iets fout gelopen');

        return view('companies/detail');
    }
}
