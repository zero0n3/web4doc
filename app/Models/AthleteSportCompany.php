<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AthleteSportCompany extends Model
{
    //
    protected $table = 'athlete_sport_company2s';



	public function athletes() {
	   return $this->belongsToMany(Athlete::class);
	}

	public function sports() {
	   return $this->belongsToMany(Sport::class);
	}

	public function companys() {
	   return $this->belongsToMany(Company::class);
	}
}
