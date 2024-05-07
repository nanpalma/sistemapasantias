<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitales extends Model
{
  use HasFactory;
  protected $fillable = [
    'nombre',
    'municipios_hospitale_id',
    'status',
  ];

  public function municipios()
  {
    return $this->belongsTo(MunicipiosHospitales::class);
  }

  public function hospitales_stock()
  {
    return $this->hasMany(StockSanidad::class, 'hospitale_id');
  }
}
