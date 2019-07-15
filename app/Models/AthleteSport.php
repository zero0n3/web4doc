<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AthleteSport extends Pivot
{
    //
    protected $table = 'athlete_sport2s';

    public function company()
    {
        return $this->belongsTo(Company::class);//->withPivot('company_id');
    }
}
