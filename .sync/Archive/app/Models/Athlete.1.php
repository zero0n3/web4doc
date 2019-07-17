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
		//'company_id'
	];

	 /**
     * The sports that belong to the user.
     */



	public function user()
	{
		return $this->belongsTo(User::class, 'user_id','id');
	}
	
	public function checkups(){
		return $this->hasMany(Checkup::class);
	}

    public function companys()
    {
        return $this->hasManyThrough(
            Company::class,
            AthleteSport::class,
            'company_id', // Foreign key on users table...
            'id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }



/*
	public function sports()
	{

	    return $this->belongsToMany(Sport::class, 'athlete_sport2s')
	    ->using(AthleteSport::class)
	    ->withPivot('company_id');

	}*/



/*
  public function companys()
	{
    return $this->belongsToMany(Company::class, 'athlete_company2s')->withPivot('sport_id');
	}



	public function relations() {
	   return $this->hasMany(AthleteSportCompany::class);
	}
*/
}