<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LicenseScope;

class License extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LicenseScope);
    }

    public function CatalogItem()
    {
        return $this->belongsTo(CatalogItem::class);
    }

}
