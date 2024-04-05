<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brigadas extends Model
{
  use HasFactory;

  protected $fillable = [
    'nombre',
    'direccion',
  ];

  public function subbrigada()
  {
    return $this->hasMany(SubBrigadas::class);
  }

  public function stock()
  {
    return $this->hasMany(Stock::class);
  }
}
