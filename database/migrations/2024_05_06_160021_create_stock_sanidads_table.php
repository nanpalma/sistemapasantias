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
    Schema::create('stock_sanidads', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_departamento')->nullable();
      $table->unsignedBigInteger('centro_salud_id')->nullable();
      // $table->foreign('materiale_id')->references('id')->on('materiales');
      $table->unsignedBigInteger('municipios_hospitale_id');
      $table->foreign('municipios_hospitale_id')->references('id')->on('municipios_hospitales');
      $table->unsignedBigInteger('hospitale_id');
      $table->foreign('hospitale_id')->references('id')->on('hospitales');
      $table->string('establecimiento')->nullable();
      $table->string('parroquia')->nullable();
      $table->string('tipo')->nullable();
      $table->longText('direccion')->nullable();
      $table->boolean('status')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('stock_sanidads');
  }
};
