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
		'athlete_id'
	];

    public function athlete()
  	{
    	return $this->belongsTo(Athlete::class, 'athlete_id','id');
  	}

}