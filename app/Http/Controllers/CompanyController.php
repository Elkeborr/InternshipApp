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
        $data['companies'] = \App\Company::with('users')->latest('companies.created_at')->get();

        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        return view('companies/index', $data);
    }

    public function show($company)
    {
        if (Auth::check()) {
            $data['internships'] = \App\Internship::where('company_id', $company)->where('status', true)->get();
            $data['company'] = \App\Company::Show($company)->first();
            $data['tags'] = \App\AssignCompanyTags::ShowCompany($company)->first();
            $data['reviews'] = \App\Review::ShowCompany($company)->first();

            return view('companies/show', $data);
        }

        return redirect('companies/login');
    }

    public function showProfile($company)
    {
        if (Auth::check()) {
            $data['company'] = \App\Company::where('id', $company)
                ->with('tags')
                ->first();

            $data['tags'] = \App\AssignCompanyTags::where('company_id', $company)
                ->with('tags')->first();

            return view('companies/showProfile', $data);
        }
    }

    public function edit($company)
    {
        if (Auth::check()) {
            $data['company'] = \App\Company::where('id', $company)
                ->with('tags')
                ->first();

            $data['tags'] = \App\AssignCompanyTags::where('company_id', $company)
                ->with('tags')->first();

            return view('companies/edit', $data);
        }
    }

    public function saveChanges(Request $request)
    {
        $validation = $request->validate([
            'companyname' => 'required|max:200',
            'email' => 'required',
            'tel' => 'required',
            'employees' => 'integer',
            'biography' => 'required',
            'street' => 'required',
            'nr' => 'required',
            'gemeente' => 'required',
            'postcode' => 'required',
        ]);

        $user = session('user');
        $company = \App\Company::where('id', $user->company_id)->first();

        $company->name = request('companyname');
        $company->email = request('email');
        $company->phoneNumber = request('tel');
        $company->employees = request('employees');
        $company->website = request('website');
        $company->bio = request('biography');
        $company->street = request('street');
        $company->streetNumber = request('nr');
        $company->city = request('gemeente');
        $company->postalCode = request('postcode');
        //$user->password = Hash::make(request('password'));
        $company->updated_at = date('Y-m-d h:i:s');
        $company->save();

        $data['company'] = \App\Company::where('id', $user->company_id)->first();

        return back()
            ->with('success', 'Wijzigingen opgeslagen');
    }

    public function imageUpload()
    {
        request()->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('company-images'), $imageName);

        $user = session('user');
        $company = \App\Company::where('id', $user->company_id)->first();
        $company->logo = $imageName;
        $company->save();

        return back()
            ->with('success', 'De afbeelding is opgeslagen.')
            ->with('image', $imageName);
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

    public function editTags(Request $request)
    {
        $validation = $request->validate([
            'tag' => 'required',
        ]);

        $user = session('user');
        $company = \App\Company::where('id', $user->company_id)->first();

        $data['company'] = \App\Company::where('id', $company)->first();

        $tag = \App\CompanyTag::where('id', request('TagId'))->first();
        $tag->name = request('tag');
        $tag->save();

        return back()
            ->with('success', 'Wijziging opgeslagen');
    }

    public function deleteTags(Request $request)
    {
        $id = request('TagId');
        $tag = \App\AssignCompanyTags::where('company_tag_id', $id)->first();
        $tag->delete();

        return back()
            ->with('success', 'Het vakgebied is verwijderd');
    }

    public function addTags(Request $request)
    {
        $validation = $request->validate([
            'tag' => 'required',
        ]);

        //company id opvragen
        $user = session('user');
        $company = \App\Company::where('id', $user->company_id)->first();

        //voeg nieuwe tag toe als deze niet bestaat
        $tag = \App\CompanyTag::where('name', request('tag'))->first();
        if (!$tag) {
            $tag = new \App\CompanyTag();
            $tag->name = request('tag');
            $tag->save();
        }

        //vraag id op van tag die je wilt linken
        $tag_id = \App\CompanyTag::where('name', request('tag'))->first();

        //assign companytag toevoegen -> relatie
        $tagAssign = new \App\AssignCompanyTags();
        $tagAssign->company_id = $company->id;
        $tagAssign->company_tag_id = $tag_id->id;
        $tagAssign->save();

        return back()
            ->with('success', 'Het nieuwe vakgebied is toegevoegd');
    }

    public function handlecreate(Request $request)
    {
        $res = $request->validate([
            'name' => ['required'],
            'bio' => ['required'],
            'phoneNumber' => ['required'],
            'email' => ['required'],
            'street' => ['required'],
            'streetNumber' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'postalCode' => ['required'],
            'employees' => ['required', 'integer', 'gt:0'],
            'website' => 'starts_with:http://,https://',
        ]);

        $request->flash();
        $user = session('user');
        $company = new \App\Company();

        $company->name = $request->input('name');
        $company->bio = $request->input('bio');
        $company->phoneNumber = $request->input('phoneNumber');
        $company->email = $request->input('email');
        $company->street = $request->input('street');
        $company->streetNumber = $request->input('streetNumber');
        $company->city = $request->input('city');
        $company->website = $request->input('website');
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
