<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CatalogItem
 *
 * @property int $id
 * @property int $catalog_id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Catalog $Catalog
 * @method static \Illuminate\Database\Query\Builder|\App\CatalogItem whereCatalogId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CatalogItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CatalogItem whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CatalogItem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CatalogItem whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CatalogItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CatalogItem extends Model
{
    /*
     * Описание связей.
     */
    public function Catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
