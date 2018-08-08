<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() != 'production') {
            factory(\App\Models\User::class, 50)->create()->each(function($user) {
                $user->ads()->saveMany(factory(\App\Models\Ads::class, 5)->make())->each(function($ads) use ($user) {
                    $ads->bill()->save(factory(\App\Models\Bill::class)->make(['user_id' => $user->id]));
                    $ads->photos()->saveMany(factory(\App\Models\Photo::class, random_int(1, 3))->make());
                });
            });
        }
    }
}
