<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractAnnexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_annexes', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('contract_id');
            $table->string('name');
            $table->integer('value');
            $table->integer('pay_period');
            $table->date('create_date');
            $table->string('specialist');
            $table->string('comment');

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
        Schema::dropIfExists('contract_annexes');
    }
}
