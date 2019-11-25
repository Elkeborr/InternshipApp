<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        // return view('search/index');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data['internships'] = \App\Internship::where('internship_function', 'LIKE', '%'.$request->search.'%')->get();

            return Response($data);
        }
    }
}
