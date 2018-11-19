<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubPostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_posters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title');
            $table->text('description');
            $table->longText('json');
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_posters');
    }
}
