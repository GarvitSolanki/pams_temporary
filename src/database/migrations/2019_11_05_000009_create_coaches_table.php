<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesTable extends Migration
{
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->increments('id');

            $table->string('coach_first_name');

            $table->string('coach_last_name');

            $table->date('coach_date_of_birth');

            $table->string('coach_gender');

            $table->string('coach_email');

            $table->string('coach_alternate_email')->nullable();

            $table->string('coach_linkedin_profile');

            $table->string('coach_github_profile');

            $table->string('coach_password');

            $table->integer('coach_phone_number');

            $table->integer('coach_alternate_phone_number')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
