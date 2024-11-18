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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->string('surname');
            $table->string('firstname');
            $table->string('app_no')->nullable();
            $table->string('txn_ref');
            $table->string('invoice');
            $table->double('total',20,2);
            $table->string('schedule_id');
            $table->longText('payload')->nullable();
            $table->string('status');
          //  $table->timestamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
