<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/08/2018
 * Time: 12.54
 */

namespace App\Models;


class Bill extends Model
{
    protected $table = 'ads_bills';

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ads()
    {
        return $this->belongsTo(Ads::class, 'ads_id', 'id');
    }
}