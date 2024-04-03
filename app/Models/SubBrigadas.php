<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBrigadas extends Model
{
  use HasFactory;
  protected $fillable = [
    'nombre',
    'brigada_id',
    'status',
  ];

  public function brigada()
  {
    return $this->belongsTo(Brigadas::class);
  }
}
