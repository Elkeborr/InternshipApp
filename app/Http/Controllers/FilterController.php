<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterCompany(Request $request)
    {
        //$data['companies'] = \App\Company::get();
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        if ($request->has('state')) {
            $state = $request->input('state');
            $query = \App\Company::whereIn('state', $state)
                ->get();
        }

        if ($request->has('tag')) {
            $tag = $request->input('tag');
            $collection = \App\AssignCompanyTags::whereIn('company_tag_id', $tag)
            ->join('companies', 'assign_company_tags.company_id', '=', 'companies.id')
            ->get();
            $query = $collection->unique('id');
        }

        if ($request->has('tag') && $request->has('state')) {
            $tag = $request->input('tag');
            $state = $request->input('state');

            $collection = \App\AssignCompanyTags::whereIn('company_tag_id', $tag)
            ->join('companies', 'assign_company_tags.company_id', '=', 'companies.id')
            ->whereIn('state', $state)->get();

            $query = $collection->unique('id');
        }

        if ($query->isEmpty()) {
            $request->session()->flash('message', 'Geen specifieke bedrijven gevonden gevonden');
            $data['companies'] = \App\Company::get();

            return view('welcome', $data);
        }
        $data['companies'] = $query;

        return view('welcome', $data);

        // $filters_tags = $request->input('tag');
        // $filters_state = $request->input('state');
        // $request->session()->flash('message', $filters_tags, $filters_state);

        return view('companies/index', $data);
    }

    public function filterWelcome(Request $request)
    {
        /*---Internships filters---*/
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();
        if ($request->has('state')) {
            $state = $request->input('state');
            $query = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
            ->whereIn('companies.state', $state)
            ->take(6)->get();
        }

        if ($request->has('tag')) {
            $tag = $request->input('tag');
            $collection = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
            ->join('assign_company_tags', 'assign_company_tags.company_id', '=', 'companies.id')
            ->whereIn('company_tag_id', $tag)->take(6)->get();

            $query = $collection->unique('id');
        }

        if ($request->has('tag') && $request->has('state')) {
            $tag = $request->input('tag');
            $state = $request->input('state');
            if ($state === 'regio') {
                $collection = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
            ->join('assign_company_tags', 'assign_company_tags.company_id', '=', 'companies.id')
            ->whereIn('company_tag_id', $tag)->take(6)->get();
            }
            if ($tag === 'Vakgebied') {
                $state = $request->input('state');
                $query = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
                ->whereIn('companies.state', $state)
                ->take(6)->get();
            }

            $collection = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
            ->join('assign_company_tags', 'assign_company_tags.company_id', '=', 'companies.id')
            ->whereIn('company_tag_id', $tag)
            ->whereIn('state', $state)
            ->take(6)->get();
        }

        if ($query->isEmpty()) {
            $request->session()->flash('message', 'Geen specifieke stages gevonden, hopelijk vind je deze ook interresant.');
            $data['internships'] = \App\Internship::get();

            return view('welcome', $data);
        }
        $data['internships'] = $query;

        return view('welcome', $data);

        // $filters_tags = $request->input('tag');
        // $filters_state = $request->input('state');
        // $request->session()->flash('message', $filters_tags, $filters_state);
    }

    public function filterInternships(Request $request)
    {
        /*---Internships filters---*/
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        if ($request->has('state')) {
            $state = $request->input('state');
            $query = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
            ->whereIn('companies.state', $state)
           ->get();
        }

        if ($request->has('tag')) {
            $tag = $request->input('tag');
            $collection = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
            ->join('assign_company_tags', 'assign_company_tags.company_id', '=', 'companies.id')
            ->whereIn('company_tag_id', $tag)->get();

            $query = $collection->unique('id');
        }

        if ($request->has('tag') && $request->has('state')) {
            $tag = $request->input('tag');
            $state = $request->input('state');
            if ($state === 'regio') {
                $collection = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
             ->join('assign_company_tags', 'assign_company_tags.company_id', '=', 'companies.id')
             ->whereIn('company_tag_id', $tag)->take(6)->get();
            }
            if ($tag === 'Vakgebied') {
                $state = $request->input('state');
                $query = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
                 ->whereIn('companies.state', $state)
                 ->take(6)->get();
            }

            $collection = \App\Internship::join('companies', 'internships.company_id', '=', 'companies.id')
             ->join('assign_company_tags', 'assign_company_tags.company_id', '=', 'companies.id')
             ->whereIn('company_tag_id', $tag)
             ->whereIn('state', $state)
             ->take(6)->get();
        }

        if ($query->isEmpty()) {
            $request->session()->flash('message', 'Geen specifieke stages gevonden, hopelijk vind je deze ook interresant.');
            $data['internships'] = \App\Internship::get();

            return view('internships/index', $data);
        }
        $data['internships'] = $query;

        return view('internships/index', $data);

        // $filters_tags = $request->input('tag');
        // $filters_state = $request->input('state');
        // $request->session()->flash('message', $filters_tags, $filters_state);
    }
}
