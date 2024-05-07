<?php

namespace Database\Seeders;

use App\Models\Hospitales;
use App\Models\MunicipiosHospitales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $brigadas = [
      [
        "id" => 1,
        "nombre" => "IRIBARREN",
      ], [
        "id" => 2,
        "nombre" => "PALAVECINO",
      ], [
        "id" => 3,
        "nombre" => "SIMÓN PLANAS",
      ], [
        "id" => 4,
        "nombre" => "CRESPO",
      ], [
        "id" => 5,
        "nombre" => "URDANETA",
      ], [
        "id" => 6,
        "nombre" => "MORAN",
      ], [
        "id" => 7,
        "nombre" => "JIMÉNEZ",
      ], [
        "id" => 8,
        "nombre" => "ANDRÉS ELOY BLANCO",
      ], [
        "id" => 9,
        "nombre" => "ANDRÉS TORRES",
      ]
    ];

    // Looping and Inserting Array's Permissions into Permission Table
    foreach ($brigadas as $value) {
      MunicipiosHospitales::create($value);
    }



    $Subbrigadas = [
      [
        "nombre" => "HOSPITALES",
        "municipios_hospitale_id" => 1,
      ], [
        "nombre" => "AMBULATORIO URBANO TIPO III",
        "municipios_hospitale_id" => 1,
      ], [
        "nombre" => "AMBULATORIO URBANO TIPO II",
        "municipios_hospitale_id" => 1,
      ], [
        "nombre" => "AMBULATORIO URBANO TIPO I",
        "municipios_hospitale_id" => 1,
      ], [
        "nombre" => "AMBULATORIO RURAL TIPO II",
        "municipios_hospitale_id" => 1,
      ], [
        "nombre" => "AMBULATORIO URBANO TIPO III",
        "municipios_hospitale_id" => 2,
      ], [
        "nombre" => "AMBULATORIO URBANO TIPO I",
        "municipios_hospitale_id" => 2,
      ], [
        "nombre" => "AMBULATORIO RURAL I",
        "municipios_hospitale_id" => 2,
      ], [
        "nombre" => "HOSPITAL",
        "municipios_hospitale_id" => 3,
      ], [
        "nombre" => "AMBULATORIO RURAL II",
        "municipios_hospitale_id" => 3,
      ], [
        "nombre" => "AMBULATORIO RURAL I",
        "municipios_hospitale_id" => 3,
      ], [
        "nombre" => "HOSPITAL",
        "municipios_hospitale_id" => 4,
      ], [
        "nombre" => "AMBULATORIO RURAL II",
        "municipios_hospitale_id" => 4,
      ], [
        "nombre" => "AMBULATORIO RURAL I",
        "municipios_hospitale_id" => 4,
      ], [
        "nombre" => "HOSPITAL",
        "municipios_hospitale_id" => 5,
      ], [
        "nombre" => "AMBULATORIO RURAL II",
        "municipios_hospitale_id" => 5,
      ], [
        "nombre" => "AMBULATORIO RURAL I",
        "municipios_hospitale_id" => 5,
      ], [
        "nombre" => "HOSPITAL",
        "municipios_hospitale_id" => 6,
      ], [
        "nombre" => "AMBULATORIO RURAL TIPO II",
        "municipios_hospitale_id" => 6,
      ], [
        "nombre" => "AMBULATORIO RURAL TIPO I",
        "municipios_hospitale_id" => 6,
      ], [
        "nombre" => "HOSPITAL",
        "municipios_hospitale_id" => 7,
      ], [
        "nombre" => "AMBULATORIO URBANO I",
        "municipios_hospitale_id" => 7,
      ], [
        "nombre" => "AMBULATORIO RURAL II",
        "municipios_hospitale_id" => 7,
      ], [
        "nombre" => "AMBULATORIO RURAL I",
        "municipios_hospitale_id" => 7,
      ], [
        "nombre" => "CENTROS DE SALUD ACONDICIONADOS Y CONSTRUIDOS POR LOS CONSEJOS COMUNALES",
        "municipios_hospitale_id" => 7,
      ], [
        "nombre" => "HOSPITAL",
        "municipios_hospitale_id" => 8,
      ], [
        "nombre" => "AMBULATORIO RURAL I",
        "municipios_hospitale_id" => 8,
      ], [
        "nombre" => "CENTROS DE SALUD ACONDICIONADOS Y CONSTRUIDOS POR LOS CONSEJOS COMUNALES",
        "municipios_hospitale_id" => 8,
      ], [
        "nombre" => "HOSPITAL",
        "municipios_hospitale_id" => 9,
      ], [
        "nombre" => "AMBULATORIO URBANO TIPO III",
        "municipios_hospitale_id" => 9,
      ], [
        "nombre" => "AMBULATORIO URBANO TIPO I",
        "municipios_hospitale_id" => 9,
      ], [
        "nombre" => "AMBULATORIO RURAL TIPO II",
        "municipios_hospitale_id" => 9,
      ], [
        "nombre" => "AMBULATORIO RURAL TIPO II",
        "municipios_hospitale_id" => 9,
      ], [
        "nombre" => "CENTROS DE SALUD ACONDICIONADOS Y CONSTRUIDOS POR LOS CONSEJOS COMUNALES",
        "municipios_hospitale_id" => 9,
      ]
    ];

    // Looping and Inserting Array's Permissions into Permission Table
    foreach ($Subbrigadas as $value) {
      Hospitales::create($value);
    }
  }
}
