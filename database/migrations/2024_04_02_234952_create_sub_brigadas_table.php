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
    Schema::create('sub_brigadas', function (Blueprint $table) {
      $table->id();
      $table->string("nombre")->nullable();
      $table->unsignedBigInteger('brigada_id');
      $table->foreign('brigada_id')->references('id')->on('brigadas');
      $table->boolean("status")->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sub_brigadas');
  }
};
