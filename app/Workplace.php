<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Workplace
 *
 * @property int $id
 * @property int $departure_id
 * @property string $pc_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace whereDepartureId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace wherePcName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Workplace extends Model
{
    //
}
