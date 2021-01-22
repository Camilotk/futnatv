<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_match', function (Blueprint $table) {
            $table->id();
            $table->foreignId('channel_id')->unsigned();
            $table->foreignId('match_id')->unsigned();
            $table->timestamps();
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channel_match', function (Blueprint $table) {
            $table->dropForeign('channel_match_channel_id_foreign');
            $table->dropForeign('channel_match_match_id_foreign');
        });
        Schema::dropIfExists('channel_match');
    }
}
