<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('NO ACTION');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('image_uri')->nullable();
            $table->integer('jersey_number')->nullable();
            $table->string('country')->nullable();
            $table->integer('matches')->default('0')->nullable();
            $table->integer('runs')->default('0')->nullable();
            $table->integer('highest_score')->default('0')->nullable();
            $table->integer('total_fifties')->default('0')->nullable();
            $table->integer('total_hundreds')->default('0')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
