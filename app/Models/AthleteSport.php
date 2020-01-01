<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class AthleteSport extends Pivot
{
    use SoftDeletes;
    //
    protected $table = 'athlete_sport';

    protected $fillable = [
        'id',
        'athlete_id',
        'sport_id',
        'team_id'
    ];

    //fiverr
    public function __construct($value = null, array $attributes = array()){
        $this->value = $value;
        parent::__construct($attributes);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    } 
    //fiverr



/*
    public function company()
    {
        return $this->belongsTo(Company::class);//->withPivot('company_id');
    }
*/
}
