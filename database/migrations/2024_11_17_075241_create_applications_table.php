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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
           // $table->unsignedBigInteger('student_id');
            $table->string('surname');
            $table->string('firstname');
            $table->string('app_no');
            $table->string('email');
            $table->unsignedBigInteger('department_id');
            $table->integer('stage')->default(0);
            $table->longText('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
