<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() != 'production') {
            factory(\App\Models\Category::class, 5)->create()->each(function($category) {
                $category->subs()->saveMany(factory(\App\Models\SubCategory::class, 7)->make());
            });
        }
    }
}
