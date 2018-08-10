<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $this->call(RolesSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(FeedbacksSeeder::class);
        $this->call(SponsorSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(PackagesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
