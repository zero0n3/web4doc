<?php

namespace App\Http\Controllers;

use App\Http\Requests\AthleteRequest;
use App\Models\Checkup;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Models\Athlete;
use Illuminate\Database\Eloquent\Collection;

class AthleteController extends Controller
{

    protected $rules = [
        'name' => 'required',
        'dob' => 'required|date',
    ];

    protected $errorMessages = [
        'name.required' => 'Il campo Nome è obbligatorio',
        'dob.required' => 'Il campo Data di Nascita è obbligatorio'
    ];


    public function index( Request $request ) {
        $queryBuilder = Athlete::orderBy('name','asc');//with(['teams','sports']);

        if($request->has('name')){
            $queryBuilder->where('name','like', '%'.$request->input('name').'%');
        }

        //id user da login
        $queryBuilder->where('user_id',Auth::user()->id);

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
    public function store(AthleteRequest $request)
    {
        $this->validate($request, $this->rules, $this->errorMessages);
        //
        $athlete = new Athlete();
        $athlete->name = $request->input('name');
        $athlete->dob = $request->input('dob');
        $athlete->sex = $request->input('sex');
        $athlete->status = 0;
        $athlete->user_id = $request->user()->id;
       
         
        $res = $athlete->save();
       
        
        $name = $request->input('name');
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
        $this->authorize($athlete);

        $visite = Checkup::with(['team:id,name','sport:id,name'])
            ->where('athlete_id','=',$id)
            ->orderBy('date','desc')
            ->orderBy('id','desc')
            ->get();//->toArray();
            //->transpose();

        if ($visite->count() > 0) {
            //$visite->forget(['1','2','3','35','36','37','38']);

            /*$collection = collect([
                ['id' => '1','date' => '01-05-2019','height' => '9', 'weight' => '100', 'bmi' => '23'],
                ['id' => '2','date' => '02-05-2019','height' => '9', 'weight' => '102', 'bmi' => '22'],
                ['id' => '3','date' => '03-05-2019','height' => '8', 'weight' => '103', 'bmi' => '25'],
                ['id' => '4','date' => '04-05-2019','height' => '7', 'weight' => '99', 'bmi' => '28'],
                ['id' => '5','date' => '05-05-2019','height' => '9', 'weight' => '98', 'bmi' => '30'],
            ]);

            $collection = $collection->transpose();
            */
            //dd($collection);
            // return view('athlete.test', [
            //       'visite' => $collection,
            //     ]);


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
                'id Visita',
                'Data visita',
                'Altezza',
                'Peso',
                'Tricipite Dx',
                'Tricipite Sx',
                'Petto Dx',
                'Petto Sx',
                'Ascella Dx',
                'Ascella Sx',
                'Iliaca Dx',
                'Iliaca Sx',
                'Addominale Dx',
                'Addominale Sx',
                'Coscia Dx',
                'Coscia Sx',
                'Spalle',
                'Petto',
                'Anche',
                'Braccio Dx',
                'Braccio Sx',
                'Gamba Dx',
                'Gamba Sx',
                'Spirometria',
                'Massa grassa',
                'BMI',
                'Frq Riposo',
                'Frq Stress',
                'Frq 1min',
                'Step 1',
                'Step 2',
                'Step 3',
                'Team',
                'Sport',
            ]);

            //dd($visite_purged);
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

            //$visite = $visite_sorted;//->transpose();

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
            /*return view('athlete.test', [
                           'visite' => $visite_sorted,
                           ]);*/
        } else {
            $visite_sorted = collect([]);
        }

         return view('athlete.dashboard', [
                'title' => $athlete->name,
                'athlete' => $athlete,
                'visite' => $visite_sorted,
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
        /*
        if(Gate::denies('manage-athlete', $athlete)){
            abort(401,'Unauthorized');
        }*/
        $this->authorize($athlete);
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
    public function update(AthleteRequest $request, $id)
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
        $athlete = Athlete::find($id);
        $this->authorize($athlete);
        $athlete->name = $request->input('name');
        $athlete->dob = $request->input('dob');
        $athlete->sex = $request->input('sex');
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
        $this->authorize($athlete);
    }

}
