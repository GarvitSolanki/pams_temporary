<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->increments('id');

            $table->string('college_name');

            $table->string('college_website');

            $table->string('college_address');

            $table->string('college_phone_number');

            $table->string('college_email');

            $table->string('college_university')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
