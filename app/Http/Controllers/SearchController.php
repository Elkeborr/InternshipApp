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
        if (!empty($_POST)) {
            if ($request->ajax()) {
                $result = '';
                try {
                    $data['internships'] = \App\Internship::where('internship_function', 'LIKE', '%'.$request->search.'%')->with('company')->get();
                    if (count($data['internships']) != 0) {
                        $result =
                        [
                            'status' => 'success',
                            'message' => 'Zoekresultaten gevonden',
                            'data' => $data,
                        ];
                    } else {
                        $result =
                        [
                            'status' => 'fail',
                            'message' => 'Geen zoekresultaten gevonden',
                        ];
                    }
                } catch (Trowable $t) {
                    $result = [
                        'status' => 'error',
                        'message' => $t->getMessage(),
                    ];
                }
                // echo json_encode($result);

                return Response($result);
            }
        }
    }
}
