<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\BudgetScope;

class budget extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new BudgetScope);
    }

    public function CatalogItem()
    {
        return $this->belongsTo(CatalogItem::class,'catalog_id','id');
    }
}
