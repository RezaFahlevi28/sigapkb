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
        Schema::create('patient_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->foreignId('kb_service_id')->constrained('kb_services')->cascadeOnDelete();
            $table->string('patient_name');
            $table->string('husband_name');
            $table->string('nik', 16)->index();
            $table->date('birth_date');
            $table->string('phone_number')->nullable();
            $table->text('address');
            $table->date('service_date')->index();
            $table->string('kb_history')->default('Peserta Baru'); // Peserta Baru, Peserta Ulangan, Ganti Cara
            $table->string('status')->default('menunggu')->index(); // menunggu, dilayani, selesai, batal
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['patient_name', 'nik']);
            $table->index(['service_date', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_registrations');
    }
};
