<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tallas_ProductosModel extends Model
{
	use TallasProdTrait;
    protected $table = 'tallas_productos';
    protected $fillable = ['id','id_producto','id_talla','cantidad'];
    public $timestamps = false;
}
