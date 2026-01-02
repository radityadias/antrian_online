<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->id('id')->autoIncrement()->nullable(false);
            $table->string('nomor', 10)->nullable(false);
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->nullable(false);
            $table->date('tanggal');
            $table->timestamp('waktu_dibuat');
            $table->timestamp('waktu_dipanggil');
            $table->timestamp('waktu_selesai');
            $table->unsignedBigInteger('admin_id');
            
            $table->foreign('admin_id')->references('id')->on('admin')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrian');
    }
};
