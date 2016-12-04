<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    //
    protected $table = "mesa";
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected  $fillable = ['NUMERO','DESCRIPCION'];
}
