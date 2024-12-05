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
        Schema::create('admission_form', function (Blueprint $table) {
            $table->id();
            $table->string('student_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('class_admitted')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('address')->nullable();
            $table->enum('status',['Active','Pending','Suspend','Approved'])->default('Active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_form');
    }
};
