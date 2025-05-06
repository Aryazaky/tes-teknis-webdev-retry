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
        Schema::create('employment_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('rank'); // golongan
            $table->string('echelon')->nullable(); // eselon
            $table->string('position')->nullable(); // jabatan
            $table->string('assignment_location')->nullable(); // tempat tugas
            $table->string('department')->nullable(); // unit kerja
            $table->string('taxpayer_id')->nullable(); // NPWP
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employment_data', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
        });
        Schema::dropIfExists('employment_data');
    }
};
