<?php

namespace Database\Seeders;

use App\Models\Brigadas;
use App\Models\SubBrigadas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrigadaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $brigadas = [
      [
        "id" => 1,
        "nombre" => "14 Brigada",
        "direccion" => "14 Brigada",
      ], [
        "id" => 2,
        "nombre" => "81 Beilos",
        "direccion" => "Sin direccion",
      ], [
        "id" => 3,
        "nombre" => "94 Brigadas Especial",
        "direccion" => "Sin direccion",
      ], [
        "id" => 4,
        "nombre" => "C2-12 GNB",
        "direccion" => "Sin direccion",
      ]
    ];

    // Looping and Inserting Array's Permissions into Permission Table
    foreach ($brigadas as $value) {
      Brigadas::create($value);
    }



    $Subbrigadas = [
      [
        "nombre" => "141 Batallón de infanteria 'Segundo riera'",
        "brigada_id" => 1,
      ], [
        "nombre" => "142 Batallón de blindado 'Juan Gillermos Iribarren'",
        "brigada_id" => 1,
      ], [
        "nombre" => "143 Batallón de Infontering Girardot",
        "brigada_id" => 1,
      ], [
        "nombre" => "145 Batallón Cruz Carrillo",
        "brigada_id" => 1,
      ], [
        "nombre" => "814 Batallón de apoyo logístico",
        "brigada_id" => 2,
      ], [
        "nombre" => "941 Batallon 'Manuel Sedeño'",
        "brigada_id" => 3,
      ], [
        "nombre" => "942 Batallón 'GNA Antonio Jose De Sucre'",
        "brigada_id" => 3,
      ], [
        "nombre" => "943 Batallón 'Juan Bautista'",
        "brigada_id" => 3,
      ], [
        "nombre" => "Detacamento 121",
        "brigada_id" => 4,
      ], [
        "nombre" => "Destacamento 122",
        "brigada_id" => 4,
      ], [
        "nombre" => "Destacamento 123",
        "brigada_id" => 4,
      ], [
        "nombre" => "DESUL",
        "brigada_id" => 4,
      ], [
        "nombre" => "Comando Rurales Nº 12",
        "brigada_id" => 4,
      ]
    ];

    // Looping and Inserting Array's Permissions into Permission Table
    foreach ($Subbrigadas as $value) {
      SubBrigadas::create($value);
    }
  }
}
