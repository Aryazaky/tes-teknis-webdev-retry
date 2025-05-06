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
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('name')->nullable(); // nama
            $table->string('birthplace')->nullable(); // tempat lahir
            $table->string('address')->nullable(); // alamat
            $table->date('birthdate'); // tanggal lahir
            $table->enum('gender', ['L', 'P']); // jenis kelamin
            $table->enum('religion', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghuchu']); // agama
            $table->string('phone')->nullable(); // nomor telepon
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_data', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
        });
        Schema::dropIfExists('personal_data');
    }
};
