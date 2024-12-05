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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id'); // ID dari konsultasi
            $table->string('title'); // Judul notifikasi
            $table->text('message'); // Isi notifikasi
            $table->boolean('is_read')->default(false); // Apakah notifikasi sudah dibaca
            $table->string('type')->nullable(); // Tipe notifikasi (approval, reschedule, dll)
            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
