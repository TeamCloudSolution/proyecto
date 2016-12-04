<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $FECHA_PEDIDO
 * @property float $TOTAL
 * @property integer $ID_MESA
 * @property integer $ID_CLIENTE
 * @property float $ESTADO
 * @property Cliente $cliente
 * @property Mesa $mesa
 * @property DetallePedido[] $detallePedidos
 */
class Pedido extends Model
{
    
    protected $primaryKey = 'ID';    
    public $timestamps = false;    
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pedido';

    /**
     * @var array
     */
    protected $fillable = ['FECHA_PEDIDO', 'TOTAL', 'ID_MESA', 'ID_CLIENTE', 'ESTADO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'ID_CLIENTE', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mesa()
    {
        return $this->belongsTo('App\Mesa', 'ID_MESA', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePedidos()
    {
        return $this->hasMany('App\DetallePedido', 'ID_PEDIDO', 'ID');
    }
}
