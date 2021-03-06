<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;
    protected $table = 'departamento';
    protected $fillable = ['nombre'];
    protected $dates = ['deleted_at'];
    
}
