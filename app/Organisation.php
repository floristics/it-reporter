<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Organisation
 *
 * @property int $id
 * @property string $name
 * @property string $inn
 * @property string $departure_name
 * @property int $user_id
 * @property int $num_workplace
 * @property int $system_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $User
 * @method static \Illuminate\Database\Query\Builder|\App\Organisation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organisation whereDepartureName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organisation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organisation whereInn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organisation whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organisation whereNumWorkplace($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organisation whereSystemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organisation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Organisation whereUserId($value)
 * @mixin \Eloquent
 */
class Organisation extends Model
{
    //

//    public function departures(){
//        return $this->hasMany('App\Departure');
//    }
    

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    /*
     * Функиция для @TrainController
     * Просто подтягиваем цепочку таблиц с помощью ключевой функции getResults();
     */
   /* public function Catalog()
    {
        $CatalogItem = $this->belongsTo(\App\CatalogItem::class, 'system_id');
        $Catalog = $CatalogItem->getResults()->belongsTo(\App\Catalog::class, 'catalog_id');
        return $Catalog;

    }*/



}
