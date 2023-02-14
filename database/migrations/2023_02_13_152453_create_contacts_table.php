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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('c_owner');
            $table->string('c_name');
            $table->string('c_phone');
            $table->string('c_mobile');
            $table->string('c_company');
            $table->string('c_email')->unique();
            $table->string('c_secondaryemail')->unique();
            $table->string('c_other_acc');
            $table->tinyInteger('c_status')->default('1');
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
        Schema::dropIfExists('contacts');
    }
};
