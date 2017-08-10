<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contract_scan
 *
 * @property int $id
 * @property int $contract_id
 * @property string $path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_scan whereContractId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_scan whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_scan whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_scan wherePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_scan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Contract_scan extends Model
{
    //
}
