<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('organisation_id');
            $table->smallInteger('pay_method');
            $table->smallInteger('contractor');
            $table->string('name');
            $table->integer('value');
            $table->integer('pay_period');
            $table->date('create_date');
            $table->string('specialist');
            $table->string('comment');
            $table->string('scan')->nullable();

            $table->timestamps();
            //todo: Объединить первичный ключ на столбцы organisation_id и catalog_items_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
