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
    Schema::create('hospitales', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('municipios_hospitale_id');
      $table->foreign('municipios_hospitale_id')->references('id')->on('municipios_hospitales');
      $table->string("nombre")->nullable();
      $table->boolean("status")->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('hospitales');
  }
};
