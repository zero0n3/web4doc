<?php
//#fattoamano
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {
//nel caso i nomi non coincidessero
  protected $table = 'teams';
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
