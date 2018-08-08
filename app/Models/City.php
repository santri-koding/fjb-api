<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/08/2018
 * Time: 12.58
 */

namespace App\Models;


class City extends Model
{
    protected $table = 'cities';

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'city_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'city_id', 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ads::class, 'city_id', 'id');
    }
}