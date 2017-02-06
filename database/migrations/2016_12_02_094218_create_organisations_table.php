<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('inn', 50);
            $table->string('departure_name', 200);
            $table->smallInteger('user_id');
            $table->smallInteger('num_workplace');
            $table->smallInteger('system_id');
            $table->timestamps();
        });
        Schema::create('systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisations');
        Schema::dropIfExists('systems');
    }
}
