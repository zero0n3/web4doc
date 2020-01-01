<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Athlete extends Model
{
    use SoftDeletes;
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
        return $this->belongsTo(User::class);
    }

    public function checkups(){
        return $this->hasMany(Checkup::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'checkups');
    }

    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'checkups');
    }


}
