<?php

namespace App\Http\Controllers;

use App\Http\Requests\SportRequest;
use Illuminate\Http\Request;
use Storage;
use App\Models\Sport;
use App\Models\Athlete;
use App\Models\Company;
use App\Models\AthleteSport;

use DB;

class SportController extends Controller
{

    protected $rules = [
        'name' => 'required',
    ];

    protected $errorMessages = [
        'name.required' => 'Il campo Nome è obbligatorio',
    ];

    //
    public function index(Request $request) {
        $queryBuilder = Sport::orderBy('name','asc');

        if($request->has('name')){
            $queryBuilder->where('name','like', '%'.$request->input('name').'%');
        }

        $sports = $queryBuilder->get();

        return view('sport.sport',
            [
                'title' => 'Lista sport',
                'sports' => $sports
            ]); 

    }
    /*
    public function index( Request $request ){
    	
    	$queryBuilder = Sport::orderBy('name','asc')->withCount('athletes');
        
        if($request->has('id')){
            $queryBuilder->where('ID','=', $request->input('id'));
        }

        if($request->has('name')){
            $queryBuilder->where('name','like', '%'.$request->input('name').'%');
        }

        $sports = $queryBuilder->get();

        return view('sport.sport',
            [
                'title' => 'Lista sport',
                'sports' => $sports
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
        return view('sport.create', [
                'title' => 'Crea Sport',
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SportRequest $request)
    {
        //
        $this->validate($request, $this->rules, $this->errorMessages);
        $sport = new Sport();
        $sport->name = $request->input('name');
        $sport->status = 0;       
         
        $res = $sport->save();


        //$sport_name = request()->input('sport_name');
        $messaggio = $res ? 'Sport   ' . $request->input('name') . ' creato' : 'Sport ' . $request->input('name') . ' non creato';
        session()->flash('message', $messaggio);
        return redirect()->route('sport.index');
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
        $sport = Sport::find($id);
        //dd($company);
        //return view('albums.edit')->with('album', $album[0]);
        return view('sport.edit',
            [
                'title' => 'Modifica Sport',
                'sport' => $sport
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SportRequest $request, $id)
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
        $sport = Sport::find($id);
        $sport->name = $request->input('name');
        //$album->user_id = 1;
        $res = $sport->save();

    
        //dd(request()->all());
        /*
        $data = request()->only(['name','description']);
        $data['id'] = $id;
        $sql = 'UPDATE albums SET album_name=:name, description=:description WHERE ID= :id';
        $res = DB::update($sql, $data);
        */
        $message = $res ? 'Sport aggiornato':'Sport NON aggiornato';
        session()->flash('message', $message);
        return redirect()->route('sport.index');
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
