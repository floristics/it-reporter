<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Workplace_soft
 *
 * @property int $id
 * @property int $workplace_id
 * @property int $catalog_items_id
 * @property int $count
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace_soft whereCatalogItemsId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace_soft whereCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace_soft whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace_soft whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace_soft whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Workplace_soft whereWorkplaceId($value)
 * @mixin \Eloquent
 */
class Workplace_soft extends Model
{
    protected $table = 'workplace_soft';
    //
}
