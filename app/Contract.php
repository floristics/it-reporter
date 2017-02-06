<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ContractScope;

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

    public function isAutor(User $user)
    {
        return $this->organisation_id == $user->GetOrgId();
    }
}
