<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armas extends Model
{
  use HasFactory;

  protected $fillable = [
    'nombre',
    'serial',
    'tipo_arma_id',
    'status',
    'user_id',
    'delet_observacion',
    'brigada_id',
    'sub_brigada_id',
    'sub_tipo_arma_id',
  ];

  public function tipo_arma()
  {
    return $this->belongsTo(TipoArmas::class, 'tipo_arma_id');
  }

  public function sub_tipo_arma()
  {
    return $this->belongsTo(SubTipoArmas::class, 'sub_tipo_arma_id');
  }

  public function brigada()
  {
    return $this->belongsTo(Brigadas::class, 'brigada_id');
  }

  public function sub_brigada()
  {
    return $this->belongsTo(SubBrigadas::class, 'sub_brigada_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
