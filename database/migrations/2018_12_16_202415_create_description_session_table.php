<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescriptionSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('description_session', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            # `book_id` and `tag_id` will be foreign keys, so they have to be unsigned
        #  Note how the field names here correspond to the tables they will connect...
        # `book_id` will reference the `books table` and `tag_id` will reference the `tags` table.
        $table->integer('session_id')->unsigned();
        $table->integer('description_id')->unsigned();

        # Make foreign keys
        $table->foreign('session_id')->references('id')->on('sessions');
        $table->foreign('description_id')->references('id')->on('descriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('description_session');
    }
}
