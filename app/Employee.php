<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\EmployeeScope;

/**
 * App\Employee
 *
 * @property int $id
 * @property int $organisation_id
 * @property string $name
 * @property int $catalog_item_id
 * @property-read \App\Organisation $org
 * @property-read \App\CatalogItem $rank
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereCatalogItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereOrganisationId($value)
 * @mixin \Eloquent
 * @property bool $status
 * @property bool $status2
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereStatus2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereUpdatedAt($value)
 */
class Employee extends Model
{
    protected static function boot() {
        parent::boot();
        static::addGlobalScope(new EmployeeScope);
    }

    public function rank()
    {
        return $this->belongsTo(CatalogItem::class,'catalog_item_id');
    }

    public function org()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }
    public function organisation()
    {
        return $this->belongTo(Organisation::class);
    }
}
