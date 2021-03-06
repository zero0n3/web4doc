<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use Illuminate\Http\Request;
use Storage;
use App\Models\Team;
use App\Models\Athlete;
use App\Models\Sport;
use App\Models\AthleteSport;
use DB;

class TeamController extends Controller
{

    protected $rules = [
        'name' => 'required',
    ];

    protected $errorMessages = [
        'name.required' => 'Il campo Nome è obbligatorio',
    ];

   public function index(Request $request) {
        $queryBuilder = Team::orderBy('name','asc');
        //$queryBuilder = Team::with('company');
/*
        if($request->has('id')){
            $queryBuilder->where('ID','=', $request->input('id'));
        }
*/
        if($request->has('name')){
            $queryBuilder->where('name','like', '%'.$request->input('name').'%');
        }

        $teams = $queryBuilder->get();
        //dd($teams);
        
        return view('team.team',
            [
                'title' => 'Lista team',
                'teams' => $teams
            ]); 

    }


/*
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

    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teams = Team::all();
        return view('team.create', [
                'title' => 'Crea Team',
                //'teams' => $teams,
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        //
        $this->validate($request, $this->rules, $this->errorMessages);
        $team = new Team();
        $team->name = $request->input('name');
        $team->status = 0;
        //$team->id = $request->input('id');
       
        $res = $team->save();
        
        //$name = request()->input('name');
        $messaggio = $res ? 'Team   ' . $request->input('name') . ' creato' : 'Team ' . $request->input('name') . ' non creato';
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
        $team = Team::find($id);
        dd($team->athletesports);
        return view('team.dashboard', [
                'title' => $team->name,
                'team' => $team,
                ]);
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
        //dd($team);
        //return view('albums.edit')->with('album', $album[0]);
        return view('team.edit',
            [
                'title' => 'Modifica Team',
                'team' => $team
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
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
        $this->validate($request, $this->rules, $this->errorMessages);
        $team = Team::find($id);
        $team->name = $request->input('name');
        //$team->id = request()->input('id');
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
