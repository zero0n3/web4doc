<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Sport;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Checkup;
//use Kris\LaravelFormBuilder\FormBuilder;

class CheckupController extends Controller
{
    public function index( Request $request ){
    	
    	//$queryBuilder = Checkup::orderBy('date','desc')->with(['athlete','team','sport']);
        $queryBuilder = Checkup::orderBy('date','desc');

        if($request->has('id')){
            $queryBuilder->where('id','=', $request->input('id'));
        }

        if($request->has('name')){
            $queryBuilder->whereHas('athlete',function (Builder $query) use($request) {
                $query->where('name', 'like', '%'.$request->input('name').'%');
            });
        }

        if($request->has('team')){
            $queryBuilder->whereHas('team',function (Builder $query) use($request) {
                $query->where('name', 'like', '%'.$request->input('team').'%');
            });
        }

        if($request->has('sport')){
            $queryBuilder->whereHas('sport',function (Builder $query) use($request) {
                $query->where('name', 'like', '%'.$request->input('sport').'%');
            });
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
    public function add($id)
    {
        $teams = Team::orderBy('name','asc')->get();
        $sports = Sport::orderBy('name','asc')->get();
        $athlete = Athlete::find($id);


        return view('checkup.add', [
            'title' => 'Visita '.$athlete->name,
            'athlete' => $athlete,
            'teams' => $teams,
            'sports' => $sports,
        ]);
    }

    /*
   public function add(FormBuilder $formBuilder, $id)
    {
        $athlete = Athlete::find($id);

        $form = $formBuilder->create('App\Forms\AddCheckup', [
            'method' => 'POST',
            'url' => route('checkup.store')
        ]);

        //return view('checkup.addc', compact('form'));
        return view('checkup.add',[
            'title' => 'Visita '.$athlete->name,
            'athlete' => $athlete,
            'form' => $form,
            ]);
    }
   */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $checkup = new Checkup();
        $checkup->altezza = $request->input('altezza');
        $checkup->peso = $request->input('peso');
        $checkup->tricipite_R = $request->input('tricipite_R');
        $checkup->tricipite_L = $request->input('tricipite_L');
        $checkup->petto_R = $request->input('petto_R');
        $checkup->petto_L = $request->input('petto_L');
        $checkup->ascella_R = $request->input('ascella_R');
        $checkup->ascella_L = $request->input('ascella_L');
        $checkup->iliaca_R = $request->input('iliaca_R');
        $checkup->iliaca_L = $request->input('iliaca_L');
        $checkup->addominale_R = $request->input('addominale_R');
        $checkup->addominale_L = $request->input('addominale_L');
        $checkup->coscia_R = $request->input('coscia_R');
        $checkup->coscia_L = $request->input('coscia_L');
        $checkup->braccio_R = $request->input('braccio_R');
        $checkup->braccio_L = $request->input('braccio_L');
        $checkup->gamba_R = $request->input('gamba_R');
        $checkup->gamba_L = $request->input('gamba_L');
        $checkup->spalle = $request->input('spalle');
        $checkup->petto = $request->input('petto');
        $checkup->anche = $request->input('anche');
        $checkup->spirometria = $request->input('spirometria');
        $checkup->frq_riposo = $request->input('frq_riposo');
        $checkup->frq_stress = $request->input('frq_stress');
        $checkup->frq_1min = $request->input('frq_1min');
        $checkup->step1 = $request->input('step1');
        $checkup->step2 = $request->input('step2');
        $checkup->step3 = $request->input('step3');
        $checkup->massa_grassa = $request->input('massa_grassa');
        $checkup->bmi = $request->input('bmi');
        $checkup->status = 0;
        $checkup->athlete_id = $request->input('id');
        $checkup->team_id = $request->input('team_id');
        $checkup->sport_id = $request->input('sport_id');
        $checkup->date = $request->input('date');


        $res = $checkup->save();


        $name = request()->input('name');
        $messaggio = $res ? 'Visita per l\'atleta ' . $name . ' salvata' : 'Visita per l\'atleta ' . $name . ' non salvata';
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
        $teams = Team::all();
        $sports = Sport::all();
        //dd($checkup);
        //return view('albums.edit')->with('album', $album[0]);
        return view('checkup.edit',[
                                    'title' => 'Modifica Visita',
                                    'checkup' => $checkup,
                                    'teams' => $teams,
                                    'sports' => $sports,
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

        $checkup->altezza = request()->input('altezza');
        $checkup->peso = request()->input('peso');
        $checkup->tricipite_R = request()->input('tricipite_R');
        $checkup->tricipite_L = request()->input('tricipite_L');
        $checkup->petto_R = request()->input('petto_R');
        $checkup->petto_L = request()->input('petto_L');
        $checkup->ascella_R = request()->input('ascella_R');
        $checkup->ascella_L = request()->input('ascella_L');
        $checkup->iliaca_R = request()->input('iliaca_R');
        $checkup->iliaca_L = request()->input('iliaca_L');
        $checkup->addominale_R = request()->input('addominale_R');
        $checkup->addominale_L = request()->input('addominale_L');
        $checkup->coscia_R = request()->input('coscia_R');
        $checkup->coscia_L = request()->input('coscia_L');
        $checkup->braccio_R = request()->input('braccio_R');
        $checkup->braccio_L = request()->input('braccio_L');
        $checkup->gamba_R = request()->input('gamba_R');
        $checkup->gamba_L = request()->input('gamba_L');
        $checkup->spalle = request()->input('spalle');
        $checkup->petto = request()->input('petto');
        $checkup->anche = request()->input('anche');
        $checkup->spirometria = request()->input('spirometria');
        $checkup->frq_riposo = request()->input('frq_riposo');
        $checkup->frq_stress = request()->input('frq_stress');
        $checkup->frq_1min = request()->input('frq_1min');
        $checkup->step1 = request()->input('step1');
        $checkup->step2 = request()->input('step2');
        $checkup->step3 = request()->input('step3');
        $checkup->massa_grassa = request()->input('massa_grassa');
        $checkup->bmi = request()->input('bmi');
        $checkup->status = 0;
        //$checkup->athlete_id = request()->input('athlete_id');
        $checkup->team_id = request()->input('team_id');
        $checkup->sport_id = request()->input('sport_id');
        $checkup->date = request()->input('date');
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
