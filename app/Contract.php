<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ContractScope;

/**
 * App\Contract
 *
 * @property int $id
 * @property int $organisation_id
 * @property int $pay_method
 * @property int $contractor
 * @property string $name
 * @property int $value
 * @property int $pay_period
 * @property string $create_date
 * @property string $specialist
 * @property string $comment
 * @property string $scan
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\CatalogItem $_contractor
 * @property-read \App\Organisation $_organisation
 * @property-read \App\CatalogItem $_pay_method
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereComment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereContractor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereCreateDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereOrganisationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract wherePayMethod($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract wherePayPeriod($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereScan($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereSpecialist($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contract whereValue($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contract_annex[] $annexes
 */
class Contract extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ContractScope);
    }
/*
 * ОРГАНИЗАЦИЯ-ВЛАДЕЛЕЦ
 */
    public function _organisation()
    {
        return $this->belongsTo(Organisation::class,'organisation_id');
    }
/*
 * ВИД ДОГОВОРА
 */
    public function _pay_method()
    {
        return $this->belongsTo(CatalogItem::class,'pay_method');
    }
/*
 * ПОДРЯДЧИК
 */
    public function _contractor()
    {
        return $this->belongsTo(CatalogItem::class,'contractor');
    }
/*
 * Проверка на авторство документа
 */
    public function isAutor(User $user)
    {
        return $this->organisation_id == $user->GetOrgId();
    }
/*
 * Связь с таблицей Приложений
 * Тип Один ко многим
 */
    public function annexes()
    {
        return $this->hasMany(Contract_annex::class);
    }
}
