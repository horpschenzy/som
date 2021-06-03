<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained();
            $table->string('othername')->default('')->after('firstname');
            $table->string('profile_picture')->default('')->after('othername');
            $table->string('address')->default('')->after('other_location');
            $table->string('marital_status')->default('')->after('email');
            $table->string('gender')->default('')->after('marital_status');
            $table->boolean('is_born_again')->default(false)->after('gender');
            $table->datetime('born_again_time')->nullable()->after('is_born_again');
            $table->boolean('is_spirit_filled')->default(false)->after('born_again_time');
            $table->string('current_church')->default('')->after('is_spirit_filled');
            $table->string('reason')->default('')->after('current_church');
            $table->string('expectation')->default('')->after('reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('othername');
            $table->dropColumn('profile_picture');
            $table->dropColumn('address');
            $table->dropColumn('marital_status');
            $table->dropColumn('gender');
            $table->dropColumn('is_born_again');
            $table->dropColumn('born_again_time');
            $table->dropColumn('is_spirit_filled');
            $table->dropColumn('current_church');
            $table->dropColumn('reason');
            $table->dropColumn('expectation');
        });
    }
}
