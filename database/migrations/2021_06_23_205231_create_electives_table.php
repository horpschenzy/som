<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electives', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('type');
            $table->mediumText('Description')->nullable();
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
        Schema::dropIfExists('electives');
    }
}
