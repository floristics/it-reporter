<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    public function CatalogItem()
    {
        return $this->belongsTo(CatalogItem::class);
    }
}
