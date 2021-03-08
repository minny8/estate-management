<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name',30);
            $table->string('address')->nullable();
            $table->integer('site_area')->nullable();
            $table->year('year_of_construction')->nullable();
            $table->integer('number_of_buildings')->nullable();
            $table->text('memo')->nullable();
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
            
    }

    /**
     * Reverse the migrations.  
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
