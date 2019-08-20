<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use Illuminate\Http\Request;
use Storage;
use App\Models\Athlete;
use Illuminate\Database\Eloquent\Collection;

class AthleteController extends Controller
{
    public function index( Request $request ) {
        $queryBuilder = Athlete::with(['teams','sports']);

        if($request->has('name')){
            $queryBuilder->where('name','like', '%'.$request->input('name').'%');
        }

        $athletes = $queryBuilder->get();
        //dd($athletes);
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
        return view('athlete.create', [
                'title' => 'Crea Atleta',
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
        $athlete->user_id = 1;
       
         
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
        $visite = Checkup::with(['team:id,name','sport:id,name'])
            ->where('athlete_id','=',$id)
            ->orderBy('date','desc')
            ->orderBy('id','desc')
            ->get();//->toArray();
            //->transpose();
        //$visite->forget(['1','2','3','35','36','37','38']);

        $collection = collect([
            ['name' => 'iPhone 6', 'brand' => 'Apple', 'type' => 'phone'],
            ['name' => 'iPhone 5', 'brand' => 'Apple', 'type' => 'phone'],
            ['name' => 'Apple Watch', 'brand' => 'Apple', 'type' => 'watch'],
            ['name' => 'Galaxy S6', 'brand' => 'Samsung', 'type' => 'phone'],
            ['name' => 'Galaxy Gear', 'brand' => 'Samsung', 'type' => 'watch'],
        ]);


        $visite_purged = $visite->map(function ($item, $key) {
            return collect($item)->forget([
                'created_at',
                'deleted_at',
                'updated_at',
                'status',
                'athlete_id',
                'sport_id',
                'team_id'
            ]);
        });

        $visite_purged->prepend([
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
            '13',
            '14',
            '15',
            '16',
            '17',
            '18',
            '19',
            '20',
            '21',
            '22',
            '23',
            '24',
            '25',
            '26',
            '27',
            '28',
            '29',
            '30',
            '31',
            '32',
            '33',
            '34',
        ]);

        //$visite_purged->all();
        $visite_trans = $visite_purged->transpose();
        //dd($visite_trans->rotate(-2));
        //$multiplied->all();
        //dd($multiplied);

        /*
        $visite_sorted = $visite_trans->map(function ($item, $key) {
            return collect($item)->rotate(-2);
        });
        */

        $visite_sorted = $visite_trans->rotate(-2);

        //dd($visite_sorted);

        $visite = $visite_sorted;//->transpose();
        //dd($visite);
        //$collection->forget('name');
        //dd($multiplied1);
        //dd(collect($visite)->transpose());
        /*
        @foreach ($athletes as $athlete)
    <tr>
        <td>{{$athlete->id}}</td>
        <td><a href="{{ route('athlete.show', ['athlete' => $athlete->id]) }}">{{$athlete->name}}</a></td>
        <td>{{date('d-m-Y', strtotime($athlete->dob))}}</td>
        <td>{{$athlete->sex}}</td>
        <td><a href="/athlete/{{$athlete->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
    </tr>
@endforeach
        */
        return view('athlete.dashboard', [
                'title' => $athlete->name,
                'athlete' => $athlete,
                'visite' => $visite,
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
        //dd($athlete);
        //return view('albums.edit')->with('album', $album[0]);
        return view('athlete.edit',[
                                    'title' => 'Modifica Atleta',
                                    'athlete' => $athlete,
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
