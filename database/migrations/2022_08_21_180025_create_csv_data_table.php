<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csv_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('csv_id')->nullable();
            $table->year('year');
            $table->integer('week');
            $table->date('date');
            $table->integer('personal_number');
            $table->unsignedInteger('hours');
            $table->string('hour_code', 255);
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
        Schema::dropIfExists('csv_data');
    }
}
