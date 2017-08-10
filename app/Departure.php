<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\departure
 *
 * @property-read \App\Organisation $organisation
 * @mixin \Eloquent
 */
class departure extends Model
{
    protected $table = 'departures';
    //
    public function organisation()
    {
        return $this->belongsTo('App\Organisation');
    }
}
