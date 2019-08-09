<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Athlete;
use App\Models\Team;
use App\Models\Sport;
use DB;

class AthleteController extends Controller
{
    public function index( Request $request ) { 
        $queryBuilder = Athlete::with('checkups');
        $athletes = $queryBuilder->get(); 


        dd($athletes->teams->name);
        return view('athlete.athlete',
            [
                'title' => 'Lista atleti',
                'athletes' => $athletes
            ]);
    }


/*
        $queryBuilder = Athlete::with('sports')->get();
        dd($queryBuilder);


        $queryBuilder = Athlete::where('id', 1)//with('sports')
        ->orderBy('name', 'asc')->get();
        dd($queryBuilder);

        if($request->has('id')){
            $queryBuilder->where('ID','=', $request->input('id'));
        }

        if($request->has('name')){
            $queryBuilder->where('name','like', '%'.$request->input('name').'%');
        }

        $athletes = $queryBuilder->get();
        dd($athletes);

        return view('athlete.athlete',
            [
                'title' => 'Lista atleti',
                'athletes' => $athletes
            ]);

    }
*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companys = Company::all();
        return view('athlete.create', [
                'title' => 'Crea Atleta',
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
        $athlete = new Athlete();
        $athlete->name = $request->input('name');
        $athlete->dob = $request->input('dob');
        $athlete->sex = $request->input('sex');
        $athlete->status = 0;
        $athlete->company_id = $request->input('company_id');
       
         
        $res = $athlete->save();
       
        
        $name = request()->input('name');
        $messaggio = $res ? 'Atleta   ' . $name . ' creato' : 'Atleta ' . $name . ' non creato';
        session()->flash('message', $messaggio);
        return redirect()->route('athlete.index');
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
        $athlete = Athlete::find($id);
        //$companys = Company::all();
        //dd($athlete);
        //return view('albums.edit')->with('album', $album[0]);
        return view('athlete.dashboard', [
                'title' => $athlete->name,
                'athlete' => $athlete,
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
        $athlete = Athlete::find($id);
        $companys = Company::all();
        //dd($athlete);
        //return view('albums.edit')->with('album', $album[0]);
        return view('athlete.edit',[
                                    'title' => 'Modifica Atleta',
                                    'athlete' => $athlete,
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
        $athlete = Athlete::find($id);
        $athlete->name = request()->input('name');
        $athlete->dob = request()->input('dob');
        $athlete->sex = request()->input('sex');
        $athlete->company_id = request()->input('company_id');
        //$album->user_id = 1;
        $res = $athlete->save();

    
        //dd(request()->all());
        /*
        $data = request()->only(['name','description']);
        $data['id'] = $id;
        $sql = 'UPDATE albums SET album_name=:name, description=:description WHERE ID= :id';
        $res = DB::update($sql, $data);
        */
        $message = $res ? 'Atleta aggiornato':'Atleta NON aggiornato';
        session()->flash('message', $message);
        return redirect()->route('athlete.index');
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