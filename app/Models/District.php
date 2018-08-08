<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/08/2018
 * Time: 12.58
 */

namespace App\Models;


class District extends Model
{
    protected $table = 'districts';

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}