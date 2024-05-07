<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipiosHospitales extends Model
{
  use HasFactory;

  protected $fillable = [
    'nombre',
  ];

  public function hospitales()
  {
    return $this->hasMany(Hospitales::class, 'municipios_hospitale_id');
  }

  public function hospitales_municipio_stock()
  {
    return $this->hasMany(StockSanidad::class, 'municipios_hospitale_id');
  }
}
