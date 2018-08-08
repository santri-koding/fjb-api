<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 06/08/2018
 * Time: 12.57
 */

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    protected $table = 'sub_categories';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ads::class, 'sub_category_id', 'id');
    }
}