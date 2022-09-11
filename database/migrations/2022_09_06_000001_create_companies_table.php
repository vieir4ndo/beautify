<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fantasy_name');
            $table->string('description');
            $table->string('federal_registration')->min(11)->max(13);
            $table->string('email');
            $table->string('phone_number');
            $table->string('logo_path');
            $table->string('adress_post_code');
            $table->string('adress_street');
            $table->string('adress_complement');
            $table->string('adress_neighborhood');
            $table->string('adress_city');
            $table->string('adress_state');
            $table->string('facebook')->nullable();
            $table->string('instragram')->nullable();
            $table->string('whatsapp')->nullable();

            $table->foreignId('administrator_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
