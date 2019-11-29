<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            /*$table->increments('id');*/
            $table->string('id',64);

            $table->string('student_first_name');

            $table->string('student_last_name');

            $table->integer('student_age');

            $table->string('student_branch');

            $table->integer('student_year');

            $table->integer('student_semester');

            $table->string('student_gender');

            $table->string('student_email')->unique();

            $table->string('student_alternate_email')->nullable();

            $table->string('student_address');

            $table->string('student_password');

            $table->string('student_linkedin_profile')->nullable();

            $table->string('student_github_profile');

            $table->string('student_aadhar_number')->nullable();

            $table->integer('student_phone_number');

            $table->integer('student_alternate_phone_number')->nullable();

            $table->date('student_date_of_birth');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
