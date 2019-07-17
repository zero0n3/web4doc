<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    //
	//nel caso i nomi non coincidessero
	protected $table = 'athlete2s';
	protected $primaryKey = 'id';
	protected $fillable = [
		'name',
		'status',
		'sex', 
		'dob',
		'company_id'
	];

	 /**
     * The sports that belong to the user.
     */

   /* public function sports()
	{
        //return $this->belongsToMany(Sport::class, 'athlete_sports');
        return $this->belongsToMany('App\Models\Sport', 'athlete_sports');
    }*/

    public function teams()
	{
        //return $this->belongsToMany(Sport::class, 'athlete_sports');
        return $this->belongsToMany('App\Models\Team', 'athlete_teams');
    }

    public function company()
  	{
    	return $this->belongsTo(Company::class, 'company_id','id');
  	}

    public function checkups(){
      return $this->hasMany(Checkup::class);
    }
}
