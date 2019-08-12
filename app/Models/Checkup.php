<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    //
	protected $table = 'checkups';
	protected $primaryKey = 'id';
	protected $fillable = [
        'date',
        'altezza',
        'peso',
        'tricipite_R',
        'tricipite_L',
        'petto_R',
        'petto_L',
        'ascella_R',
        'ascella_L',
        'iliaca_R',
        'iliaca_L',
        'addominale_R',
        'addominale_L',
        'coscia_R',
        'coscia_L',
        'spalle',
        'petto',
        'anche',
        'braccio_R',
        'braccio_L',
        'gamba_R',
        'gamba_L',
        'spirometria',
        'massa_grassa',
        'bmi',
        'frq_riposo',
        'frq_stress',
        'frq_1min',
        'step1',
        'step2',
        'step3',
        'status',
        'athlete_id',
        'team',
        'sport',
	];

    public function athlete()
  	{
    	return $this->belongsTo(Athlete::class, 'athlete_id','id');
  	}

    public function team()
  	{
    	return $this->belongsTo(Team::class, 'team_id','id');
  	}

    public function sport()
  	{
    	return $this->belongsTo(Sport::class, 'sport_id','id');
  	}

}
