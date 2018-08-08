<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('post_date');
            $table->string('title');
            $table->text('description');
            $table->text('short_desc')->nullable();
            $table->integer('price');
            $table->enum('type', ['former', 'loan', 'new']);
            $table->enum('paid_ads', ['Y', 'N'])->default('N');
            $table->boolean('paid_off')->default(false);
            $table->boolean('is_kecik')->default(false);
            $table->boolean('is_sold')->default(false);
            $table->boolean('status')->default(false);
            $table->unsignedInteger('admin_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('sub_category_id')->nullable();
            $table->unsignedInteger('city_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('admin_id')
                ->references('id')->on('admins');
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')->on('categories');
            $table->foreign('sub_category_id')
                ->references('id')->on('sub_categories');
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
        Schema::dropIfExists('ads');
    }
}
