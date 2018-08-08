<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/08/2018
 * Time: 12.59
 */

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_role', 'role_id', 'admin_id');
    }
}