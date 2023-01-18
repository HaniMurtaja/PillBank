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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->integer('age');
            $table->string('phone');
            $table->string('blood_pressure');
            $table->string('blood_group');
            $table->float('height');
            $table->string('weight');
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
        Schema::dropIfExists('user_health');
    }
};
