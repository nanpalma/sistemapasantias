<?php

namespace Database\Seeders;

use App\Models\SubTipoArmas;
use App\Models\TipoArmas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposArmaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $tipo = [
      ['id' => 1, 'nombre' => 'Pistola'],
      ['id' => 2, 'nombre' => 'Revólver'],
      ['id' => 3, 'nombre' => 'Escopeta'],
      ['id' => 4, 'nombre' => 'Rifle'],
      ['id' => 5, 'nombre' => 'Fusil'],
      ['id' => 6, 'nombre' => 'Subfusil'],
      ['id' => 7, 'nombre' => 'Ametralladora'],
      ['id' => 8, 'nombre' => 'Metralleta'],
      ['id' => 9, 'nombre' => 'Carabina'],
      ['id' => 10, 'nombre' => 'Mosquete'],
      ['id' => 11, 'nombre' => 'Cañón'],
      ['id' => 12, 'nombre' => 'Arma automática'],
      ['id' => 13, 'nombre' => 'Arma semiautomática'],
      ['id' => 14, 'nombre' => 'Arma de fuego corta'],
      ['id' => 15, 'nombre' => 'Arma de fuego larga'],
    ];

    // Looping and Inserting Array's Permissions into Permission Table
    foreach ($tipo as $value) {
      TipoArmas::create($value);
    }

    $subtipos = [
      ['nombre' => 'Pistola semiautomática', 'tipo_arma_id' => 1],
      ['nombre' => 'Pistola de bolsillo', 'tipo_arma_id' => 1],
      ['nombre' => 'Pistola compacta', 'tipo_arma_id' => 1],

      ['nombre' => 'Revólver de acción simple', 'tipo_arma_id' => 2],
      ['nombre' => 'Revólver de acción doble', 'tipo_arma_id' => 2],
      ['nombre' => 'Revólver de tambor', 'tipo_arma_id' => 2],

      ['nombre' => 'Escopeta de caza', 'tipo_arma_id' => 3],
      ['nombre' => 'Escopeta táctica', 'tipo_arma_id' => 3],
      ['nombre' => 'Escopeta de corredera', 'tipo_arma_id' => 3],
      ['nombre' => 'Escopetas de doble cañón', 'tipo_arma_id' => 3],

      ['nombre' => 'Rifle de cerrojo', 'tipo_arma_id' => 4],
      ['nombre' => 'Rifle semiautomático', 'tipo_arma_id' => 4],
      ['nombre' => 'Rifle de francotirador', 'tipo_arma_id' => 4],
      ['nombre' => 'Rifles de asalto', 'tipo_arma_id' => 4],

      ['nombre' => 'Fusil de asalto', 'tipo_arma_id' => 5],
      ['nombre' => 'Fusil de precisión', 'tipo_arma_id' => 5],
      ['nombre' => 'Fusil de combate', 'tipo_arma_id' => 5],

      ['nombre' => 'Subfusil compacto', 'tipo_arma_id' => 6],
      ['nombre' => 'Subfusil con culata plegable', 'tipo_arma_id' => 6],
      ['nombre' => 'Subfusil con mira holográfica', 'tipo_arma_id' => 6],

      ['nombre' => 'Ametralladora pesada', 'tipo_arma_id' => 7],
      ['nombre' => 'Ametralladora ligera', 'tipo_arma_id' => 7],
      ['nombre' => 'Ametralladora de cinta', 'tipo_arma_id' => 7],

      ['nombre' => 'Metralleta compacta', 'tipo_arma_id' => 8],
      ['nombre' => 'Metralleta de asalto', 'tipo_arma_id' => 8],
      ['nombre' => 'Metralleta táctica', 'tipo_arma_id' => 8],

      ['nombre' => 'Carabina de caza', 'tipo_arma_id' => 9],
      ['nombre' => 'Carabina deportiva', 'tipo_arma_id' => 9],
      ['nombre' => 'Carabina táctica', 'tipo_arma_id' => 9],

      ['nombre' => 'Mosquete de avancarga', 'tipo_arma_id' => 10],
      ['nombre' => 'Mosquete de retrocarga', 'tipo_arma_id' => 10],
      ['nombre' => 'Mosquete de chispa', 'tipo_arma_id' => 10],

      ['nombre' => 'Cañón de artillería', 'tipo_arma_id' => 11],
      ['nombre' => 'Cañón naval', 'tipo_arma_id' => 11],
      ['nombre' => 'Cañón antiaéreo', 'tipo_arma_id' => 11],

      ['nombre' => 'Arma automática ligera', 'tipo_arma_id' => 12],
      ['nombre' => 'Arma automática pesada', 'tipo_arma_id' => 12],
      ['nombre' => 'Arma automática de precisión', 'tipo_arma_id' => 12],

      ['nombre' => 'Arma semiautomática de combate', 'tipo_arma_id' => 13],
      ['nombre' => 'Arma semiautomática deportiva', 'tipo_arma_id' => 13],
      ['nombre' => 'Arma semiautomática táctica', 'tipo_arma_id' => 13],

      ['nombre' => 'Revólver', 'tipo_arma_id' => 14],
      ['nombre' => 'Pistola', 'tipo_arma_id' => 14],
      ['nombre' => 'Derringer', 'tipo_arma_id' => 14],

      ['nombre' => 'Rifle', 'tipo_arma_id' => 15],
      ['nombre' => 'Escopeta', 'tipo_arma_id' => 15],
      ['nombre' => 'Fusil', 'tipo_arma_id' => 15],
    ];

    // Looping and Inserting Array's Permissions into Permission Table
    foreach ($subtipos as $value) {
      SubTipoArmas::create($value);
    }
  }
}
