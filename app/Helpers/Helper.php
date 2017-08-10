<?php
/**
 * Created by PhpStorm.
 * User: p.rodionov
 * Date: 18.05.2017
 * Time: 10:25
 */

namespace App\Helpers;

use App\FundamentalSetting;


class Helper
{
    /**
     * @param $var - имя переменной FundamentalSettings
     * @return FundamentalSettings::value
     */
    public static function getVarValue($var){

        $model = FundamentalSetting::class;
        $model = new $model;
        return $model->where('var', $var)->first()->value;

    }


    public static function isYearToday($year){

        return $year == date('Y');

    }
}