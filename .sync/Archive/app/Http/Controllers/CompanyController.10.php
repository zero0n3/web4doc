<?php
// #fattoamano da riga di comando poi editato
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Company;
use App\Models\Athlete;
use App\Models\Team;
//use Spatie\Searchable\Search;
use DB;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
    	
    	$queryBuilder = Company::orderBy('company_name','asc')->withCount('athletes')->withCount('teams');
        
        if($request->has('id')){
            $queryBuilder->where('ID','=', $request->input('id'));
        }

        if($request->has('company_name')){
            $queryBuilder->where('company_name','like', '%'.$request->input('company_name').'%');
        }

        $companys = $queryBuilder->get();

        return view('company.company',
            [
                'title' => 'Lista società',
                'companys' => $companys
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //dd($id);
        //$sql = 'SELECT id, album_name, description from albums WHERE ID = :id';
        //$album = DB::select($sql, ['id'=>$id]);
        $company = Company::find($id);
        //dd($company);
        //return view('albums.edit')->with('album', $album[0]);
        return view('company.edit',
            [
                'title' => 'Modifica società',
                'company' => $company
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$res = DB::table('albums')->where('id', $id)->update(
/*
        $res = Album::where('id', $id)->update(
          [
            'album_name' => request()->input('name'),
            'description' => request()->input('description')
          ]
        );
        */
        $company = Company::find($id);
        $company->company_name = request()->input('name');
        //$album->user_id = 1;
        $res = $company->save();

    
        //dd(request()->all());
        /*
        $data = request()->only(['name','description']);
        $data['id'] = $id;
        $sql = 'UPDATE albums SET album_name=:name, description=:description WHERE ID= :id';
        $res = DB::update($sql, $data);
        */
        $message = $res ? 'Società aggiornata':'Società NON aggiornata';
        session()->flash('message', $message);
        return redirect()->route('company.index');
        /*return view('company.company',
            [
                'title' => 'Lista società'
            ]);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $companys = DB::table('companys')->where('company_name', 'like', '%'.$search.'%')->paginate(5);
        //dd($companys);
        return view('company.search', ['searchResults' => $companys]);

    
    }


}
