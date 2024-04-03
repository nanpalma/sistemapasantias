<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoArmas extends Model
{
  use HasFactory;
  protected $fillable = [
    'nombre',
    'status',
  ];


  public function sub_tipos()
  {
    return $this->hasMany(SubTipoArmas::class);
  }
}
