<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() != 'production') {
            factory(App\Models\Admin::class, 10)->create()->each(function($admin) {
                $role_ids = App\Models\Role::pluck('id')->all();
                $admin->roles()->attach(array_random($role_ids, 3));
            });
        }
    }
}
