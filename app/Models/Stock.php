<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  use HasFactory;
  protected $fillable = [
    'id_departamento',
    'materiale_id',
    'brigadas_id',
    'sub_brigada_id',
    'toe',
    'dotado',
    'faltan',
    'operativo',
    'inoperativo',
    'observacion',
    'status',
  ];

  public function material()
  {
    return $this->belongsTo(Materiales::class, "materiale_id");
  }
}
