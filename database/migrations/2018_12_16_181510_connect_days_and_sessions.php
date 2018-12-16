<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectDaysAndSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {

            # Add a new INT field called `day_id` that is unsigned (i.e. positive)
            $table->integer('day_id')->unsigned();

            # This field `author_id` is a foreign key that connects to the `id` field in the `authors` table
            $table->foreign('day_id')->references('id')->on('days');

        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine table name + fk field name + the word "foreign"
            $table->dropForeign('sessions_author_id_foreign');

            $table->dropColumn('day_id');
        });
    }
}
