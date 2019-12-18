<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterCompany(Request $request)
    {
        $request->flash();
        //$data['companies'] = \App\Company::get();
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        $tag = $request->input('tag');
        $state = $request->input('state');
        if ($request->has('state')) {
            $query = \App\Company::ofState($state)->inRandomOrder()->get();
        }
        if ($request->has('tag')) {
            $collection = \App\AssignCompanyTags::OfTag($tag)->inRandomOrder()->get();
            $query = $collection->unique('id');
        }
        if ($request->has('tag') && $request->has('state')) {
            $collection = \App\AssignCompanyTags::OfTag($tag, $state)->inRandomOrder()->get();
            $query = $collection->unique('id');
        }

        if ($query->isEmpty()) {
            $request->session()->flash('message', 'Geen specifieke bedrijven gevonden. Misschien vind je deze interresant.');
            $data['companies'] = \App\Company::inRandomOrder()->get();

            return view('companies/index', $data);
        }

        $data['companies'] = $query;

        return view('companies/index', $data);
    }

    public function filterWelcome(Request $request)
    {
        $request->flash();
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        $state = $request->input('state');
        $tag = $request->input('tag');
        if ($request->has('state')) {
            $query = \App\Internship::OfState($state)->take(6)->get();
        }

        if ($request->has('tag')) {
            $collection = \App\Internship::ofTag($tag)->take(6)->get();
            $query = $collection->unique('id');
        }

        if ($request->has('tag') && $request->has('state')) {
            if ($state === 'regio') {
                $collection = \App\Internship::ofTag($tag)->take(6)->inRandomOrder()->get();
            }
            if ($tag === 'Vakgebied') {
                $state = $request->input('state');
                $query = \App\Internship::OfState($state)->take(6)->inRandomOrder()->get();
            }
            $collection = \App\Internship::OfTagAndState($tag, $state)->take(6)->inRandomOrder()->get();
        }

        if ($query->isEmpty()) {
            $request->session()->flash('message', 'Geen specifieke stages gevonden, hopelijk vind je deze ook interresant.');
            $data['internships'] = \App\Internship::get()->take(6);

            return view('welcome', $data);
        }
        $data['internships'] = $query;

        return view('welcome', $data);
    }

    public function filterInternships(Request $request)
    {
        $request->flash();
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        $tag = $request->input('tag');
        $state = $request->input('state');

        if ($request->has('state')) {
            $query = \App\Internship::OfState($state)->latest('internships.created_at')->get();
        }

        if ($request->has('tag')) {
            $collection = \App\Internship::OfTag($tag)->latest('internships.created_at')->get();
            $query = $collection->unique('id');
        }

        if ($request->has('tag') && $request->has('state')) {
            $collection = \App\Internship::OfTagAndState($tag, $state)->take(6)->latest('internships.created_at')->get();
        }

        if ($query->isEmpty()) {
            $request->session()->flash('message', 'Geen specifieke stages gevonden, hopelijk vind je deze ook interresant.');
            $data['internships'] = \App\Internship::latest('internships.created_at')->get();

            return view('internships/index', $data);
        }
        $data['internships'] = $query;

        return view('internships/index', $data);
    }
}
