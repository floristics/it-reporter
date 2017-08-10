<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Scopes\AnnexScope;

/**
 * App\Contract_annex
 *
 * @property int $id
 * @property int $contract_id
 * @property string $name
 * @property int $value
 * @property int $pay_period
 * @property string $create_date
 * @property string $specialist
 * @property string $comment
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereContractId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereCreateDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex wherePayPeriod($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereSpecialist($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereValue($value)
 * @mixin \Eloquent
 * @property string $scan
 * @method static \Illuminate\Database\Query\Builder|\App\Contract_annex whereScan($value)
 */
class Contract_annex extends Model
{
    protected static function boot()
    {
        parent::boot();
        //static::addGlobalScope(new AnnexScope);
    }

    /**
     * @param null $id //id договора
     * @return mixed
     */
    public function getOrganisationId($id = null)
    {
        if ($id == null) { $id = $this->contract_id; }
        return DB::table('contracts')->where('id',$id)->value('organisation_id');
    }
}
