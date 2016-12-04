<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //

    protected $table = "producto";
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected  $fillable = ['NOMBRE','DESCRIPCION','PRECIO','STOCK','ID_CATEGORIA','RUTA_IMAGEN'];

    public function categoria()
{
    return $this->belongsTo('App\categoria', 'ID_CATEGORIA', 'ID');
}
}
