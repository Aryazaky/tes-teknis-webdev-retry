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
        // Yang ada nullable itu yang di contoh database ada baris kosongnya.
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_number')->unique()->nullable(); // NIP
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Karena model lain bergantung ke employees, jadi urutan drop-nya di paling akhir.
        Schema::dropIfExists('employees');
    }
};
