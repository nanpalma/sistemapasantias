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
        "brigadas_id" => 1,
      ], [
        "nombre" => "142 Batallón de blindado 'Juan Gillermos Iribarren'",
        "brigadas_id" => 1,
      ], [
        "nombre" => "143 Batallón de Infontering Girardot",
        "brigadas_id" => 1,
      ], [
        "nombre" => "145 Batallón Cruz Carrillo",
        "brigadas_id" => 1,
      ], [
        "nombre" => "814 Batallón de apoyo logístico",
        "brigadas_id" => 2,
      ], [
        "nombre" => "941 Batallon 'Manuel Sedeño'",
        "brigadas_id" => 3,
      ], [
        "nombre" => "942 Batallón 'GNA Antonio Jose De Sucre'",
        "brigadas_id" => 3,
      ], [
        "nombre" => "943 Batallón 'Juan Bautista'",
        "brigadas_id" => 3,
      ], [
        "nombre" => "Detacamento 121",
        "brigadas_id" => 4,
      ], [
        "nombre" => "Destacamento 122",
        "brigadas_id" => 4,
      ], [
        "nombre" => "Destacamento 123",
        "brigadas_id" => 4,
      ], [
        "nombre" => "DESUL",
        "brigadas_id" => 4,
      ], [
        "nombre" => "Comando Rurales Nº 12",
        "brigadas_id" => 4,
      ]
    ];

    // Looping and Inserting Array's Permissions into Permission Table
    foreach ($Subbrigadas as $value) {
      SubBrigadas::create($value);
    }
  }
}
