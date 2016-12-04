<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected  $fillable = ['CI','NOMBRE','TELEFONO','CORREO'];
}
