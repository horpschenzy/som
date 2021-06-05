<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirstnameSurnameToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('user_id')->after('id')->nullable();
            $table->string('firstname')->after('user_id')->nullable();
            $table->string('surname')->after('firstname')->nullable();
            $table->string('description')->after('surname')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('firstname');
            $table->string('surname');
            $table->string('description');
        });
    }
}
