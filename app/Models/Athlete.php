<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sport; //#fattoamano
use App\Models\Team; //#fattoamano
use App\Models\AthleteSport; //#fattoamano
use Illuminate\Database\Eloquent\Relations\Pivot;

class Athlete extends Model
{
    //
	//nel caso i nomi non coincidessero
	protected $table = 'athletes';
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


	//fiverr
    public function __construct($value = null, array $attributes = array()){
      $this->value = $value;
      parent::__construct($attributes);
    }

    public function sports(){
      return $this->belongsToMany(Sport::class)
      ->withPivot('team_id');
    }

    /*public function teams(){
      return $this->belongstoMany(Team::class);
    }*/  

     public function newPivot(Model $parent, array $attributes, $table, $exists,$using = null) {
      if ($parent instanceof Sport) {
           return new AthleteSport($parent, $attributes, $table, $exists,"");
       }
       return parent::newPivot($parent, $attributes, $table, $exists,"");
   }
   //fiverr





/*
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




	public function sports()
	{

	    return $this->belongsToMany(Sport::class, 'athlete_sport2s')->withPivot('company_id');

	}

*/

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