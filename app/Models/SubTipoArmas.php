<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTipoArmas extends Model
{
  use HasFactory;
  protected $fillable = [
    'tipo_arma_id',
    'nombre',
  ];

  public function tipos()
  {
    return $this->belongsTo(TipoArmas::class);
  }
}
