<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table ="categoria";
    protected $primaryKey = 'ID';
    public $timestamps =false;
    protected $fillable =['NOMBRE','DESCRIPCION'];
    
    public function productos()
    {
        return $this->hasMany('App\Producto', 'ID_CATEGORIA', 'ID');
    }
  }
