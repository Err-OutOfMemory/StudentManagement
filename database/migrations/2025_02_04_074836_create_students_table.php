<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void

    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('name');
            $table->string('surname');
            $table->date('dob');
            $table->float('gpa', 3, 2)->check('gpa >= 0.00 and gpa <= 4.00');
            $table->string('school_id');
            $table->foreign('school_id')->references('school_id')->on('schools')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
