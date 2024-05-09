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
        Schema::create('pregrados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('img', 200);
            $table->string('plasEs', 200);
            $table->string('duracion', 50);
            $table->string('facultad', 500);
            $table->string('titulo', 300);
            $table->string('estado', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregrados');
    }
};
