<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
  protected $table    = 'unidads';
  protected $fillable = [ 'id', 'unidad' ];
}
