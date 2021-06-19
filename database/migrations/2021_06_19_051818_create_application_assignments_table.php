<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('document', 255)->nullable();
            $table->unsignedBigInteger('assignment_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('score')->nullable();
            $table->longText('text')->nullable();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
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
        Schema::dropIfExists('application_assignments');
    }
}
