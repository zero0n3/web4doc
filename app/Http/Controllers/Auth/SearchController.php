<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\Sport;
use DB;


class SearchController extends Controller
{
    //

public function index()
{
    $sports = Sport::all();
    return view('search', compact('sports'));
}


    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Sport::class, 'name')
            ->perform($request->input('query'));

        return view('result', compact('searchResults'));
    }
}
