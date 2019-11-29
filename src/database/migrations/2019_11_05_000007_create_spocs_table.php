<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpocsTable extends Migration
{
    public function up()
    {
        Schema::create('spocs', function (Blueprint $table) {
            $table->string('id');

            $table->string('spoc_first_name');

            $table->string('spoc_last_name');

            $table->integer('spoc_age');

            $table->date('spoc_date_of_birth');

            $table->string('spoc_gender');

            $table->string('spoc_email')->unique();

            $table->string('spoc_alternate_email')->nullable();

            $table->string('spoc_linkedin_profile');

            $table->string('spoc_github_profile');

            $table->string('spoc_password');

            $table->integer('spoc_phone_number');

            $table->integer('spoc_alternate_phone_number')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
