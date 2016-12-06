<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cliente;
use App\DetallePedido;
use App\Pedido;
use App\Producto;
use Laracasts\Flash\Flash;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $cliente = Cliente::where ('ESTADO',1)->orderBy ('NOMBRE','ASC')->paginate(5);
        $products = Producto::where('ESTADO',1)->orderBy ('ID','ASC')->paginate(5);
      //  print_r($products);
        $pedido_id = -1;
        $todosDetallePedido = DetallePedido::where('ID_PEDIDO',-5)->orderBy ('ID','ASC')->paginate(10);//Puede que lo use
        return view('pedidos.index')->with('productos',$products)->with('pedido_id',$pedido_id)->with('todosDetallePedido',-1)->with('pedidoFinalizado',0)->with('tipoOperacion',0)->with('totalPedido',0);  //primero la vista y luego la variable
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clientes.create');
    }

    /**
     * Guarda un detalle pedido temporalmente
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoOperacion = $request->input('tipoOperacion');
        if($tipoOperacion == 10){
            
            // print_r($request);//Imprimiendo lo que me llega
             //Obteniendo un valor del form
             $idPedido = $request->input('pedido_id');//obteneiendo la cantidad del producto

             if($idPedido == -1){
                 Flash::warning('Estimado cliente, adicione productos para ordenar.');  
             }else{
                 $pedido = Pedido::find($idPedido);
                 $pedido->ESTADO = 1;
                 $todosDetallePedido = DetallePedido::where('ID_PEDIDO',$idPedido)->orderBy ('ID','ASC')->paginate(10);
                 $total = 0;
                 foreach ($todosDetallePedido as $detallePedido){
                     $total = $total + $detallePedido->SUBTOTAL;
                 }
                 $pedido->TOTAL = $total;
                 $pedido->ID_MESA = 300;
                 $pedido->save();
             }
             $products = Producto::where('ESTADO',1)->orderBy ('ID','ASC')->paginate(5);


             return view('pedidos.index')->with('productos',$products)->with('pedido_id',$idPedido)->with('todosDetallePedido',-1)->with('pedidoFinalizado',1)->with('totalPedido',0);  //primero la vista y luego la variable
            
            
        }else{


       // print_r($request);//Imprimiendo lo que me llega
        //Obteniendo un valor del form
        $cantidad = $request->input('cantidad');//obteneiendo la cantidad del producto
        $idProducto = $request->input('producto_id');//obteneiendo la cantidad del producto
        $idPedido = $request->input('pedido_id');//obteneiendo la cantidad del producto
         $importe = $request->input('importe');
        $pedido;
        if ($idPedido == -1){
            $pedido = new Pedido();
            $pedido->ESTADO=2;
            $pedido->FECHA_PEDIDO=date("Y-m-d h:i:s");
            $pedido->ID_CLIENTE=1;
            $pedido->ID_MESA=300;
            $pedido->TOTAL=0;
            $pedido->save();            
        }else{
            $pedido = Pedido::find($idPedido);
        }

        
        $detallePedido=new DetallePedido();
        $detallePedido->CANTIDAD =$cantidad;
        $detallePedido->IMPORTE =$importe;
        $detallePedido->SUBTOTAL =$importe* $cantidad;
        $detallePedido->ID_PRODUCTO =$idProducto;
        $detallePedido->ID_PEDIDO =$pedido->ID;
        $detallePedido->save();
        
  
        $products = Producto::where('ESTADO',1)->orderBy ('ID','ASC')->paginate(10);
        
        $todosDetallePedido = DetallePedido::where('ID_PEDIDO',$pedido->ID)->orderBy ('ID','ASC')->paginate(10);
        
        $total=0;
                 foreach ($todosDetallePedido as $detallePedido){
                     $total = $total + $detallePedido->SUBTOTAL;
                 }
        

        return view('pedidos.index')->with('productos',$products)->with('pedido_id',$pedido->ID)->with('todosDetallePedido',$todosDetallePedido)->with('pedidoFinalizado',0)->with('tipoOperacion',0)->with('totalPedido',$total);  //primero la vista y luego la variable
            


            
        }
        
        
    }



    public function update(Request $request)
    {
       // print_r($request);//Imprimiendo lo que me llega
        //Obteniendo un valor del form
        $idPedido = $request->input('pedido_id');//obteneiendo la cantidad del producto
        
        if($idPedido == -1){
            Flash::warning('Estimado cliente, adicione productos para ordenar.');  
        }else{
            $pedido = Pedido::find($idPedido);
            $pedido->ESTADO = 1;
            $todosDetallePedido = DetallePedido::where('ID_PEDIDO',$idPedido)->orderBy ('ID','ASC')->paginate(10);
            $total = 0;
            foreach ($todosDetallePedido as $detallePedido){
                $total = $total + $detallePedido->SUBTOTAL;
            }
            $pedido->TOTAL = $total;
            $pedido->ID_MESA = 300;
            $pedido->save();
        }
        $products = Producto::where('ESTADO',1)->orderBy ('ID','ASC')->paginate(5);

        
        return view('pedidos.index')->with('productos',$products)->with('pedido_id',-1)->with('todosDetallePedido',-1)->with('pedidoFinalizado',1);  //primero la vista y luego la variable
    }



    

    public function resumen(Request $request)
    {
        print_r($request);

        return redirect()->route('clientes.index');
    }    
    
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function mostrarDetalle($idPedido)
//    {
//        
//        $detallePedidos = DetallePedido::where('ID_PEDIDO',$idPedido)->orderBy ('ID','ASC')->paginate(10);
//        return view('pedidos.detallePedido')->with('detallePedidos',$detallePedidos); 
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID)
    {
        //
        $cliente = Cliente::find($ID);
        return view ('clientes.edit')-> with ('clientes',$cliente);
    }

//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $ID)
//    {
//        //
//        $cliente = new Cliente();
//        $cliente=$cliente->find($ID);
//        $cliente->fill($request->all());
//        $cliente->save();
//        Flash::warning('El cliente '. $cliente->NOMBRE. ' ha sido editado exitosamente..');
//        return redirect()->route('clientes.index');
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $cliente =Cliente::find($ID);
        $cliente->ESTADO = 0;
        //  $cliente->delete();
        $cliente->save();
        Flash::error('El cliente '. $cliente->NOMBRE.' ha sido borrado');
        return redirect()->route('clientes.index');
    }
}
