<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/08/2018
 * Time: 12.52
 */

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes;

    protected $table = 'feedbacks';

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}