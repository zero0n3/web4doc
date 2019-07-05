<?php

//#fattoamano
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

//nel caso i nomi non coincidessero
  protected $table = 'teams';
  protected $primaryKey = 'id';
  protected $fillable = [
    'team_name',
    'team_status',
    'company_id'
  ];

	public function athletes()
	{
	    //return $this->belongsToMany(Athlete::class, 'athletesports');
	    return $this->belongsToMany('App\Models\Athlete', 'athlete_teams');
	}

    public function company()
  	{
    	return $this->belongsTo(Company::class, 'company_id','id');
  	}

}





