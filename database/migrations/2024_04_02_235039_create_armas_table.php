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
    Schema::create('armas', function (Blueprint $table) {
      $table->id();
      $table->string("nombre")->nullable();
      $table->string("serial")->unique();
      $table->unsignedBigInteger('tipo_arma_id');
      $table->foreign('tipo_arma_id')->references('id')->on('tipo_armas');
      $table->boolean("status")->default(true);
      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->longText("delet_observacion")->nullable();
      $table->unsignedBigInteger('brigada_id');
      $table->foreign('brigada_id')->references('id')->on('brigadas');
      $table->unsignedBigInteger('sub_brigada_id');
      $table->foreign('sub_brigada_id')->references('id')->on('sub_brigadas');

      $table->unsignedBigInteger('sub_tipo_arma_id');
      $table->foreign('sub_tipo_arma_id')->references('id')->on('sub_tipo_armas');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('armas');
  }
};
