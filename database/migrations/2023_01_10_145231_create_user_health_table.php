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
        Schema::create('user_healths', function (Blueprint $table) {

         
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('careby_id');
            $table->string('name');
            $table->string('gender');
            $table->date('dob');
            $table->string('phone');
            $table->string('blood_pressure');
            $table->string('blood_group');
            $table->float('height');
            $table->float('weight');
            $table->string('bmI');
            $table->string('total_cholestrol');
            $table->string('LDL_cholestrol');
            $table->string('HDL_cholestrol');
            $table->string('triglycerides');
            $table->string('glucose');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_healths');
    }
};
