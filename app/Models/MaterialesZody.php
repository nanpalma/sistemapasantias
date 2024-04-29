<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialesZody extends Model
{
  use HasFactory;
  protected $fillable = [
    'nombre',
    'tipo_material_id',
  ];
}
