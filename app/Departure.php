<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departure extends Model
{
    protected $table = 'departures';
    //
    public function organisation()
    {
        return $this->belongsTo('App\Organisation');
    }
}
