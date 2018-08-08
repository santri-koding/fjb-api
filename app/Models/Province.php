<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/08/2018
 * Time: 12.58
 */

namespace App\Models;


class Province extends Model
{
    protected $table = 'provinces';

    public function cities()
    {
        return $this->hasMany(City::class, 'province_id', 'id');
    }
}