<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockSanidad extends Model
{
  use HasFactory;
  protected $fillable = [
    'id_departamento',
    'centro_salud_id',
    'municipios_hospitale_id',
    'hospitale_id',
    'establecimiento',
    'parroquia',
    'tipo',
    'direccion',
    'status',
  ];

  public function municipio_hospitales()
  {
    return $this->belongsTo(MunicipiosHospitales::class, "municipios_hospitale_id");
  }

  public function hospitales()
  {
    return $this->belongsTo(Hospitales::class, "hospitale_id");
  }
}
