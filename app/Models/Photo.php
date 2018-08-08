<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/08/2018
 * Time: 12.56
 */

namespace App\Models;


class Photo extends Model
{
    protected $table = 'ads_photos';

    public $timestamps = false;

    public function ads()
    {
        return $this->belongsTo(Ads::class, 'ads_id', 'id');
    }
}