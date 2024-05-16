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
            $table->string('password')->nullable();
            $table->foreignId('department_id')->constrained();
            $table->string('parent_address');
            $table->enum('class_method',['online','physical']);
            $table->string('next_of_kin');
            $table->string('next_of_kin_phone');
            $table->string('email')->unique();
            $table->string('parent_phone');
            $table->string('sponsor');
            $table->string('sponsor_phone');
            $table->string('signature');
            $table->enum('hostel',['yes','no']);
            $table->enum('skill_monetization',['yes','no']);
            $table->enum('payment_method',['one_time','installments']);
            $table->string('passport');
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
