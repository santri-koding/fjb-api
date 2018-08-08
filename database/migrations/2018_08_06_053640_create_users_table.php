<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->text('address')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->string('photo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->boolean('email_confirmation')->default(false);
            $table->boolean('phone_confirmation')->default(false);
            $table->boolean('is_whatsapp')->default(false);
            $table->string('token')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_id')
                ->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
