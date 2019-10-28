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
            $request->session()->flash('email', $company->email);
            //Retrieve data and put it in session
            $user_id = Auth::id();
            $user = \App\User::where('id', $user_id)->select('id', 'name', 'email', 'type', 'company_id')->first();
            //Put user data in session User
            $request->session()->put('user', $user);
            // dd($sessionData['name']);

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
        return view('companies/create');
    }

    public function handlecreate()
    {
        /* $user = session('user');

         $client_id = 'IZ2UJDBHVPX4TUMUUNZ3FJSFTX5WJJEFHFRQCAZDO0K4P3NC';
         $secret = 'QVJC4RMSRBYL1BJ1HQMLB5DAQ2CTMWLY50NK2NEVGYGAY0Y3';
         $redirecturi = 'http://sprintern.weareimd.be';
         $getToken = 'https://foursquare.com/oauth2/authenticate?client_id='.$client_id.'&response_type=token&redirect_uri='.$redirecturi.'';
         $api = 'https://'.$redirecturi.'/?code='.$getToken.'';
         //FRNUKITLVBBAFV5IB4DP1TCHT5E4K4%3A%3A1635339172

         $query = $_GET[$user->email];

         $fsSearch = file_get_contents('https://api.foursquare.com/v2/users/search?client_id='.$client_id.'&client_secret='.$secret.'&v=20140623&ll=40.7,-74&query='.$query);

         $response = curl_exec($fsSearch);
         curl_close($fsSearch);

         var_dump($response);*/
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
