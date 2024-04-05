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
    Schema::create('stocks', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_departamento');
      $table->unsignedBigInteger('materiale_id');
      $table->foreign('materiale_id')->references('id')->on('materiales');
      $table->unsignedBigInteger('brigadas_id');
      $table->foreign('brigadas_id')->references('id')->on('brigadas');
      $table->unsignedBigInteger('sub_brigada_id');
      $table->foreign('sub_brigada_id')->references('id')->on('sub_brigadas');
      $table->float('toe')->nullable();
      $table->float('dotado')->nullable();
      $table->float('faltan')->nullable();
      $table->float('operativo')->nullable();
      $table->float('inoperativo')->nullable();
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
    Schema::dropIfExists('stocks');
  }
};
