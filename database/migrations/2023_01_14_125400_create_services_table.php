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
        Schema::create('service', function (Blueprint $table) {
            $table->bigIncrements('service_id');
            $table->string('service_name', 100);
            $table->integer('service_price');
            $table->string('service_description', 110);
            $table->string('service_phone', 45);
            $table->string('service_image', 110);
            $table->string('service_address', 110);
            $table->string('service_category', 110);
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
        Schema::dropIfExists('services');
    }
};
