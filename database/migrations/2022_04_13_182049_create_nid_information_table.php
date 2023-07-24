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
        Schema::create('nid_information', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("name");
            $table->string("bangla_name");
            $table->string("father_name");
            $table->string("mother_name");
            $table->string("date_of_birth");
            $table->string("mobile")->unique();
            $table->string("email")->unique();
            $table->string("nid_number")->unique();
            $table->string("gender");
            $table->string("blood_name")->nullable();
            $table->string("zilla_name");
            $table->string("upozilla_name");
            $table->string("address_name");
            $table->string("auth_signature")->nullable();
            $table->string("signature")->nullable();
            $table->string("photo")->nullable();
            $table->string("Create_name");
            $table->tinyInteger("status")->default(1);
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
        Schema::dropIfExists('nid_information');
    }
};
