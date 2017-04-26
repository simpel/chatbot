<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::dropIfExists('messages');
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('msg'); // the body of the message
            
            $table->string('type'); // msg, action, etc
            $table->text('quickreplies')->nullable(); // the body of the message
            $table->integer('user_id'); //user associated with the message
            $table->integer('thread_id'); //what thread the message is part of
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
        Schema::dropIfExists('messages');
    }
}
