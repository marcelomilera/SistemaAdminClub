<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{    
	protected $table = 'maestro_producto';
    protected $fillable = 
    ['nombre',
     'descripcion',
     'estado',
     'id_tipo_producto'];
}