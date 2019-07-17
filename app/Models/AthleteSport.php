<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Sport;
use app\Models\Athlete;

class AthleteSport extends Pivot
{
    //
    protected $table = 'athlete_sport2s';

    //fiverr
    public function __construct($value = null, array $attributes = array()){
        $this->value = $value;
        parent::__construct($attributes);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    } 
    //fiverr



/*
    public function company()
    {
        return $this->belongsTo(Company::class);//->withPivot('company_id');
    }
*/
}