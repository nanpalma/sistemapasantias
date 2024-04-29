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
    Schema::create('materiales_zodies', function (Blueprint $table) {
      $table->id();
      $table->string("nombre")->nullable();
      $table->unsignedBigInteger('tipo_material_id');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('materiales_zodies');
  }
};
