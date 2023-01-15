<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_health', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigIncrements('user_id');
            $table->string('user_name', 110);
            $table->string('user_gender', 15);
            $table->integer('user_age');
            $table->string('user_phone', 30);
            $table->string('user_blood', 10);
            $table->string('blood_group');
            $table->string('user_height', 50);
            $table->string('user_weight', 50);
            $table->string('user_bp', 50);
            $table->string('user_symptoms', 50);
            $table->string('user_address', 110);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_health');
    }
};
