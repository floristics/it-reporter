<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\BudgetScope;

/**
 * App\budget
 *
 * @property int $id
 * @property int $organisation_id
 * @property int $catalog_id
 * @property int $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\CatalogItem $CatalogItem
 * @method static \Illuminate\Database\Query\Builder|\App\budget whereCatalogId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\budget whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\budget whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\budget whereOrganisationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\budget whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\budget whereValue($value)
 * @mixin \Eloquent
 * @property int $catalog_item_id
 * @method static \Illuminate\Database\Query\Builder|\App\budget whereCatalogItemId($value)
 * @property bool $accepted
 * @property int $year
 * @method static \Illuminate\Database\Query\Builder|\App\budget whereAccepted($value)
 * @method static \Illuminate\Database\Query\Builder|\App\budget whereYear($value)
 */
class budget extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new BudgetScope);
    }

    public function CatalogItem()
    {
        return $this->belongsTo(CatalogItem::class,'catalog_item_id','id');
    }

}
