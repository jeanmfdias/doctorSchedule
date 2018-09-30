<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_time');
            $table->text('description');
            $table->text('exams')->nullable();
            $table->enum('status', ['CONSULTED', 'CANCELED', 'MISSED', 'SCHEDULED'])
                ->default('SCHEDULED');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('register_by_user_id')->unsigned();
            $table->timestamps();

            $table->foreign('doctor_id')->on('doctors')->references('id')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('patient_id')->on('patients')->references('id')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('register_by_user_id')->on('users')->references('id')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
