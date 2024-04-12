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
    Schema::create('vehiculo_zodis', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_departamento');
      $table->string('marca')->nullable();
      $table->string('modelo')->nullable();
      $table->string('color')->nullable();
      $table->string('placa')->unique()->nullable();
      $table->string('serial_chasis')->unique()->nullable();
      $table->string('serial_motor')->unique()->nullable();
      $table->string('ubicacion')->nullable();
      $table->boolean('operativo')->default(false);
      $table->boolean('inoperativo')->default(false);
      $table->boolean('status')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('vehiculo_zodis');
  }
};
