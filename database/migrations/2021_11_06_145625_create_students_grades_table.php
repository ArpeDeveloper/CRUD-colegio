<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('grade_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->string('section');
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
        Schema::dropIfExists('students_grades');
    }
}
