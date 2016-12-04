<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property float $CANTIDAD
 * @property float $IMPORTE
 * @property float $SUBTOTAL
 * @property integer $ID_PRODUCTO
 * @property integer $ID_PEDIDO
 * @property Pedido $pedido
 * @property Producto $producto
 */
class DetallePedido extends Model
{
    protected $primaryKey = 'ID';    
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detalle_pedido';

    /**
     * @var array
     */
    protected $fillable = ['CANTIDAD', 'IMPORTE', 'SUBTOTAL', 'ID_PRODUCTO', 'ID_PEDIDO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo('App\Pedido', 'ID_PEDIDO', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'ID_PRODUCTO', 'ID');
    }
}
