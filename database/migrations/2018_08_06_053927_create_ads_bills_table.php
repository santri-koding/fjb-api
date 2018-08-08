<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ads_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('admin_id')->nullable();
            $table->integer('total_payment');
            $table->timestamps();

            $table->foreign('admin_id')
                ->references('id')->on('admins');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->foreign('ads_id')
                ->references('id')->on('ads');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_bills');
    }
}
