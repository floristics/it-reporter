<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*        Schema::create('departures', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('name', 200);
                    $table->string('description', 250);
                    $table->smallInteger('organisation_id');
                    $table->smallInteger('user_id');
                    $table->smallInteger('num_workplace');
                    $table->timestamps();
                });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('departures');
    }
}
