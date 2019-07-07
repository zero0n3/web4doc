<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Team;
use App\Models\Athlete;
use App\Models\Company;
use DB;

class TeamController extends Controller
{
    public function index( Request $request ){
    	

    	$queryBuilder = Team::orderBy('team_name','asc')->withCount('athletes')->with('company');
        //$queryBuilder = Team::with('company');

        if($request->has('id')){
            $queryBuilder->where('ID','=', $request->input('id'));
        }

        if($request->has('team_name')){
            $queryBuilder->where('team_name','like', '%'.$request->input('team_name').'%');
        }

        $teams = $queryBuilder->get();
        //dd($teams);
        
        return view('team.team',
            [
                'title' => 'Lista team',
                'teams' => $teams
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
        $companys = Company::all();
        return view('team.create', [
                'title' => 'Crea Team',
                'companys' => $companys,
                ]);
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
        $team = new Team();
        $team->team_name = $request->input('team_name');
        $team->team_status = 0;
        $team->company_id = $request->input('company_id');
       
         
        $res = $team->save();
       
        
        $team_name = request()->input('team_name');
        $messaggio = $res ? 'Team   ' . $team_name . ' creato' : 'Team ' . $team_name . ' non creato';
        session()->flash('message', $messaggio);
        return redirect()->route('team.index');
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
        $team = Team::find($id);
        $companys = Company::all();
        //dd($team);
        //return view('albums.edit')->with('album', $album[0]);
        return view('team.edit',
            [
                'title' => 'Modifica Team',
                'team' => $team,
                'companys' => $companys,
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
        $team = Team::find($id);
        $team->team_name = request()->input('name');
        $team->company_id = request()->input('company_id');
        //$album->user_id = 1;
        $res = $team->save();

    
        //dd(request()->all());
        /*
        $data = request()->only(['name','description']);
        $data['id'] = $id;
        $sql = 'UPDATE albums SET album_name=:name, description=:description WHERE ID= :id';
        $res = DB::update($sql, $data);
        */
        $message = $res ? 'Team aggiornato':'Team NON aggiornato';
        session()->flash('message', $message);
        return redirect()->route('team.index');
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


}
