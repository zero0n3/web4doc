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
    	
    	$queryBuilder = Checkup::orderBy('date','desc')->with(['athlete','team','sport']);
        //dd($queryBuilder);
        if($request->has('id')){
            $queryBuilder->where('id','=', $request->input('id'));
        }

        $checkups = $queryBuilder->paginate(25);
        //dd($checkups);

        return view('checkup.checkup',
            [
                'title' => 'Lista visite',
                'checkups' => $checkups
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
        $checkup = Checkup::find($id);
        //$companys = Company::all();
        //dd($checkup);
        //return view('albums.edit')->with('album', $album[0]);
        return view('checkup.edit',[
                                    'title' => 'Modifica Visita',
                                    'checkup' => $checkup,
                                    //'companys' => $companys,
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
        $checkup = Checkup::find($id);
        $checkup->date = request()->input('date');
        $checkup->height = request()->input('height');
        $checkup->weight = request()->input('weight');
        $checkup->triceps_L = request()->input('triceps_L');
        $checkup->triceps_R = request()->input('triceps_R');
        $checkup->chest_L = request()->input('chest_L');
        $checkup->chest_R = request()->input('chest_R');
        //$album->user_id = 1;
        $res = $checkup->save();

    
        //dd(request()->all());
        /*
        $data = request()->only(['name','description']);
        $data['id'] = $id;
        $sql = 'UPDATE albums SET album_name=:name, description=:description WHERE ID= :id';
        $res = DB::update($sql, $data);
        */
        $message = $res ? 'Visita aggiornata':'Visita NON aggiornata';
        session()->flash('message', $message);
        return redirect()->route('checkup.index');
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
