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
        if (Auth::check()) {
            $data['companies'] = \DB::table('companies')->get();

            return view('companies/index', $data);
        }

        return redirect('companies/login');
    }

    public function show($company)
    {
        if (Auth::check()) {
            $data['company'] = \App\Company::where('id', $company)->with('reviews')->first();

            return view('companies/show', $data);
        }

        return redirect('companies/login');
    }

    public function showMyInternships()
    {
        $user = session('user');
        $data['myinternships'] = \DB::table('internships')->where('company_id', $user->company_id)->get();

        return view('companies/myInternships', $data);
    }

    public function create()
    {
        $user = session('user');
        $query = $user->name;
        $client_id = env('FOURSQUARE_CLIENT_ID');
        $secret = env('FOURSQUARE_SECRET');
        $version = env('VERSION');

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
        $data['tags'] = \DB::table('company_tags')->get();

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
        $company->userid = $user->id;
        $saved = $company->save();

        $tags = $request->input('tag');
        foreach ($tags as $tag) {
            $newtag = new \App\AssignCompanytags();
            $newtag->tag_id = json_decode($tag);
            $newtag->user_id = $user->id;
            $savedTags = $newtag->save();
        }

        if ($saved && $savedTags) {
            $request->session()->flash('message', 'Welcome to your homepage');

            return redirect('home');
        }
        $request->session()->flash('message', 'Oeps, something went wrong');

        return view('companies/detail');
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
