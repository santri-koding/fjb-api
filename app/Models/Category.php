<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/08/2018
 * Time: 12.57
 */

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    public function subs()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ads::class, 'category_id', 'id');
    }
}