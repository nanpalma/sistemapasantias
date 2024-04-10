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
    Schema::create('stock_transportes', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_departamento');
      $table->unsignedBigInteger('vehiculo_id');
      $table->foreign('vehiculo_id')->references('id')->on('vehiculos');

      $table->unsignedBigInteger('brigadas_id');
      $table->foreign('brigadas_id')->references('id')->on('brigadas');
      // $table->unsignedBigInteger('sub_brigada_id');
      // $table->foreign('sub_brigada_id')->references('id')->on('sub_brigadas');

      $table->boolean('operativo')->default(false);
      $table->boolean('reparado')->default(false);
      $table->boolean('inoperativo')->default(false);
      $table->longText('observacion')->nullable();
      $table->boolean('status')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('stock_transportes');
  }
};
