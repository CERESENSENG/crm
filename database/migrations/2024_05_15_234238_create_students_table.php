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
            $table->string('surname');
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('app_no')->nullable();;
            $table->string('matric_no')->nullable();;
            $table->string('admission_year')->nullable();
            $table->string('cohort')->nullable();
            $table->string('status')->default(0);
            $table->string('approved_at')->nullable();
            $table->string('rejected_at')->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('department_id')->default(0);
           // $table->foreign('department_id')->references('id')->on('departments');
            $table->enum('class_method',['online','physical']);
            $table->string('next_of_kin');
            $table->string('next_of_kin_phone')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('sponsors')->nullable();
            $table->string('address')->nullable();
            $table->string('terms')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->enum('wifi',['yes','no'])->nullable();
            $table->enum('hostel',['yes','no'])->nullable();
            $table->enum('skill_monetization',['yes','no'])->nullable();
            $table->enum('payment_method',['one-time','installments'])->nullable();
            $table->string('passport')->nullable();
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
