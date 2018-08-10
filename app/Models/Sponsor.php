<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 08/08/2018
 * Time: 16.50
 */

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Sponsor extends Model
{
    use SoftDeletes;

    protected $table = 'sponsors';

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}