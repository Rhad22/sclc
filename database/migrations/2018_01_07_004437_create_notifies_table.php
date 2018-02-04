<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender');
            $table->integer('receiver');
            $table->string('content');
            $table->integer('read');
            $table->integer('type');
<<<<<<< HEAD
            $table->string('link_id');
=======
            $table->integer('link_id');
>>>>>>> eed94e903716173a1687c4e9ffb846aa5d71c1f3
            $table->integer('dept_id');
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
        Schema::dropIfExists('notifies');
    }
}
