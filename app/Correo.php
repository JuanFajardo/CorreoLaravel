<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
  protected $table    = 'correos';
  protected $fillable = [ 'id', 'correo', 'clave', 'nombre', 'cargo', 'unidad', 'entrega', 'fecha_activacion', 'fecha_desactivacion', 'activo', 'observacion' ];
}
