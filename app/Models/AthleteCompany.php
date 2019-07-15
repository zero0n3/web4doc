<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AthleteCompany extends Pivot
{
    //
    protected $table = 'athlete_company2s';

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }  

}
