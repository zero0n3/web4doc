<?php

//#fattoamano
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sport extends Model
{
	use SoftDeletes;

	//nel caso i nomi non coincidessero
	protected $table = 'sports';
	protected $primaryKey = 'id';
	protected $fillable = [
		'name',
		'status'
	];

    public function checkups(){
        return $this->hasMany(Checkup::class);
    }

    public function athletes()
    {
        return $this->belongsToMany(Athlete::class,'checkups');
    }
    
}
