<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Team;
use App\Models\Athlete;
use App\Models\Company;
use DB;

class AthleteController extends Controller
{
    public function index( Request $request ){
    	
    	$queryBuilder = Athlete::orderBy('name','asc')->with('company');

        if($request->has('id')){
            $queryBuilder->where('ID','=', $request->input('id'));
        }

        if($request->has('name')){
            $queryBuilder->where('name','like', '%'.$request->input('name').'%');
        }

        $athletes = $queryBuilder->get();
        //dd($athletes);

        return view('athlete',
            [
                'title' => 'Lista atleti',
                'athletes' => $athletes
            ]);

    }
}