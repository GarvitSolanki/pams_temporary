<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('project_name');

            $table->longText('project_description');

            $table->string('project_reference_url')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
