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
		'height',
		'weight', 
		'triceps_R',
		'triceps_L',
		'chest_R',
		'chest_L',
		'status',
		'athlete_id',
		'team_id',
		'sport_id',
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