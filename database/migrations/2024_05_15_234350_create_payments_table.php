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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->enum('payment_option', ['full_payment', 'half_payment']);
            $table->string('purpose')->nullable();
            $table->string('invoice')->nullable();
            $table->string('transaction_reference');
            $table->string('gateway')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('status')->default(0);
            $table->string('gateway_response')->nullable();
            $table->string('signature')->nullable();
            $table->string('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
