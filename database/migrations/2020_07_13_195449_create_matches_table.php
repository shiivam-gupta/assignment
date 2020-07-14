<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->integer('first_team_id')->nullable()->comment('Team Id of first team');
            $table->integer('second_team_id')->nullable()->comment('Team Id of Second team');
            $table->enum('result',['0','1'])->default('0')->comment('0:Draw,1:Winner');
            $table->integer('winner_team_id')->nullable();
            $table->datetime('scheduled_date')->nullable();
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
        Schema::dropIfExists('matches');
    }
}
