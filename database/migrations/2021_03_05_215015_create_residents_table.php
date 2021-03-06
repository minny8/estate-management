<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_id');
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('tel',12);
            $table->integer('rent');
            $table->integer('security_deposit')->nullable();
            $table->date('move_in_date');
            $table->date('move_out_date')->nullable();
            $table->text('memo')->nullable();
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residents');
    }
}
