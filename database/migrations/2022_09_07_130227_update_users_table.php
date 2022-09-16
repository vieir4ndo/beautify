<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->unique();
            $table->date('birth_date')->nullable();
            $table->integer('type')->default(\App\Enums\UserType::Client->value);
            $table->boolean('active')->default(true);

            $table->foreignId('company_id')->nullable()->constrained('companies');
            $table->dropColumn('current_team_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('type');
            $table->dropColumn('birth_date');

            $table->dropColumn('company_id');
        });
    }
}
