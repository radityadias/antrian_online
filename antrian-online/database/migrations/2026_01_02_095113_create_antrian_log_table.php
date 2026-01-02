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
        Schema::create('antrian_log', function (Blueprint $table) {
            $table->id('id')->autoIncrement()->nullable(false);
            $table->enum('status', ['dipanggil', 'selesai', 'dilewati'])->nullable(false);
            $table->timestamp('waktu_perubahan')->nullable(false);
            $table->unsignedBigInteger('antrian_id');

            $table->foreign('antrian_id')->references('id')->on('antrian')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrian_log');
    }
};
