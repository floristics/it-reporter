<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FundamentalSetting
 *
 * @property int $id
 * @property string $name Человеческое название настройки/параметра. Например "Email-ы для оповещений"
 * @property string $var параметр, на который завязаться в коде. Изменять его уже нельзя ибо пото искать все вхождения в код.
 * @property string $value Значение параметра (список почт, цифровое значение и тп.)
 * @property string $description Описание параметра для вывода в админке в качестве подказки
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\FundamentalSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FundamentalSetting whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FundamentalSetting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FundamentalSetting whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FundamentalSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FundamentalSetting whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FundamentalSetting whereVar($value)
 * @mixin \Eloquent
 */
class FundamentalSetting extends Model
{
    protected $table = 'fundamental_settings';
    //что разрешаем править
    protected $fillable = [
        'name', 'var', 'value', 'description',
    ];

}
