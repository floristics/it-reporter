<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Catalog
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Catalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Catalog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Catalog whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Catalog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Catalog extends Model
{
    /*
     * Бред, нет колонки в таблице - нет связи. Выключаем и тестируем
     */
   /*
    public function CatalogItem()
    {
        return $this->belongsTo(CatalogItem::class);
    }
   */
}
