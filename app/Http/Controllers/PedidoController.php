<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cliente;
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
        return view('pedidos.index'); //primero la vista y luego la variable
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cliente = new Cliente( $request ->all());
        $cliente-> ESTADO = 1;
        // $cliente->ci = $request->numero;
        // $cliente->nombre = $request->nombre;
        // $cliente->telefono = $request->telefono;
        // $cliente->correo = $request->email;
        $cliente->save();
       // dd ('Cliente Creado Satisfactoriamente!!');
        Flash::success("Se ha registrado: " . $cliente-> NOMBRE . " de forma Exitosa !");
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID)
    {
        //
        $cliente = new Cliente();
        $cliente=$cliente->find($ID);
        $cliente->fill($request->all());
        $cliente->save();
        Flash::warning('El cliente '. $cliente->NOMBRE. ' ha sido editado exitosamente..');
        return redirect()->route('clientes.index');
    }

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
