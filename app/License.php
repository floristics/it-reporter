<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LicenseScope;

/**
 * App\License
 *
 * @property int $id
 * @property int $organisation_id
 * @property int $catalog_item_id
 * @property int $quantity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\CatalogItem $CatalogItem
 * @method static \Illuminate\Database\Query\Builder|\App\License whereCatalogItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\License whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\License whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\License whereOrganisationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\License whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\License whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
