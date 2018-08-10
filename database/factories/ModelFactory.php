<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => 'password',
        'address' => $faker->streetAddress,
        'city_id' => function() {
            return \App\Models\City::inRandomOrder()->first()->id;
        },
        'birthday' => $faker->date(),
        'gender' => $faker->randomElement(['L', 'P']),
        'photo' => 'photo.jpg',
        'email_confirmation' => $faker->boolean,
        'phone_confirmation' => $faker->boolean,
        'is_whatsapp' => $faker->boolean,
        'token' => $faker->word,
        'deleted_at' => function() use ($faker) {
            return ($faker->boolean) ? $faker->dateTime : null;
        }
    ];
});

$factory->define(App\Models\Admin::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'password' => 'password',
        'deleted_at' => function() use ($faker) {
            return ($faker->boolean) ? $faker->dateTime() : null;
        }
    ];
});

$factory->define(App\Models\Ads::class, function (Faker\Generator $faker) {
    return [
        'post_date' => $faker->dateTime,
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'short_desc' => $faker->sentence,
        'price' => $faker->numberBetween(50000, 10000000),
        'type' => $faker->randomElement(['former', 'loan', 'new']),
        'paid_ads' => $faker->randomElement(['Y', 'N']),
        'paid_off' => $faker->boolean,
        'is_kecik' => $faker->boolean,
        'is_sold' => $faker->boolean,
        'status' => $faker->boolean,
        'admin_id' => function() {
            return \App\Models\Admin::inRandomOrder()->first()->id;
        },
        'category_id' => function() {
            return \App\Models\Category::inRandomOrder()->first()->id;
        },
        'sub_category_id' => function() {
            return \App\Models\SubCategory::inRandomOrder()->first()->id;
        },
        'city_id' => function() {
            return \App\Models\City::inRandomOrder()->first()->id;
        },
        'deleted_at' => function() use ($faker) {
            return ($faker->boolean) ? $faker->dateTime : null;
        }
    ];
});

$factory->define(App\Models\Bill::class, function (Faker\Generator $faker) {
    return [
        'admin_id' => function() {
            return \App\Models\Admin::inRandomOrder()->first()->id;
        },
        'total_payment' => $faker->numberBetween(10000, 100000)
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->sentence,
        'order' => $faker->numberBetween(0, 10),
        'deleted_at' => function() use ($faker) {
            return ($faker->boolean) ? $faker->dateTime : null;
        }
    ];
});

$factory->define(App\Models\City::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->word,
    ];
});

$factory->define(App\Models\District::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->word,
    ];
});

$factory->define(App\Models\Feedback::class, function (Faker\Generator $faker) {
    return [
        'admin_id' => function() use ($faker) {
            return ($faker->boolean) ? \App\Models\Admin::inRandomOrder()->first()->id : null;
        },
        'name' => $faker->name,
        'subject' => $faker->sentence,
        'description' => $faker->paragraph,
        'deleted_at' => function() use ($faker) {
            return ($faker->boolean) ? $faker->dateTime : null;
        }
    ];
});

$factory->define(App\Models\Package::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10000, 100000),
        'is_active' => $faker->boolean,
        'order' => $faker->numberBetween(0, 10)
    ];
});

$factory->define(App\Models\Photo::class, function (Faker\Generator $faker) {
    return [
        'path' => 'ads/2018/07/18/',
        'photo' => 'photo.jpg',
    ];
});

$factory->define(App\Models\Province::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->word,
    ];
});

$factory->define(App\Models\Role::class, function (Faker\Generator $faker) {
    $role = $faker->name;
    return [
        'name' => $role,
        'slug' => str_slug($role),
        'description' => $faker->sentence,
        'deleted_at' => function() use ($faker) {
            return ($faker->boolean) ? $faker->dateTime() : null;
        }
    ];
});

$factory->define(\App\Models\Sponsor::class, function (Faker\Generator $faker) {
    return [
        'admin_id' => function() {
            return \App\Models\Admin::withTrashed()->inRandomOrder()->first()->id;
        },
        'name' => $faker->company,
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'link' => $faker->url,
        'photo' => $faker->image(),
        'photo_link' => $faker->imageUrl(),
        'status' => $faker->boolean,
        'ended_at' => function() use ($faker) {
            return $faker->boolean ? $faker->dateTime : null;
        },
        'count' => $faker->numberBetween(),
        'deleted_at' => function() use ($faker) {
            return $faker->boolean ? $faker->dateTime : null;
        }
    ];
});

$factory->define(App\Models\SubCategory::class, function (Faker\Generator $faker) {
    $sub_category = $faker->name;
    return [
        'name' => $sub_category,
        'slug' => str_slug($sub_category),
        'description' => $faker->sentence,
        'order' => $faker->numberBetween(0, 10),
        'deleted_at' => function() use ($faker) {
            return ($faker->boolean) ? $faker->dateTime() : null;
        }
    ];
});
