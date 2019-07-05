<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Athlete;
use App\Models\Checkup;
use DB;

class CheckupController extends Controller
{
    public function index( Request $request ){
    	
    	$queryBuilder = Checkup::orderBy('date','desc')->with('athlete');

        if($request->has('id')){
            $queryBuilder->where('ID','=', $request->input('id'));
        }

        $checkups = $queryBuilder->get();
        //dd($checkups);

        return view('checkup',
            [
                'title' => 'Lista visite',
                'checkups' => $checkups
            ]);

    }
}
