<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Producto;
use Laracasts\Flash\Flash;
use App\categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $producto = Producto ::where ('ESTADO',1)->orderBy ('NOMBRE','ASC')->paginate(5);
        return view('productos.index')->with('productos',$producto); //primero la vista y luego la variable
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $categoria = categoria::where('ESTADO', 1)->orderBy('NOMBRE','ASC')->paginate(5);
        $categoria = categoria::all(['NOMBRE','ID']);

          return view ('productos.create',compact('ID','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request->file('imagen')){
                  $file = $request->file('imagen');

                //dd($file);
                $name = $file->getClientOriginalName();
                //dd($name);definir la ruta

                $path =public_path().'/imagenes/productos/';
                $file->move($path, $name);



        $producto = new Producto( $request ->all());
        $producto-> ESTADO = 1;
        $producto->RUTA_IMAGEN =$file->getClientOriginalName();
        // $cliente->ci = $request->numero;
        // $cliente->nombre = $request->nombre;
        // $cliente->telefono = $request->telefono;
        // $cliente->correo = $request->email;
        $producto->save();

       // dd ('Cliente Creado Satisfactoriamente!!');
        Flash::success("Se ha registrado: " . $producto-> NOMBRE . " de forma Exitosa !");
        return redirect()->route('productos.index');
        }
        else{
error_log ('n hay imagen');
            return redirect()->route('productos.index');

        }
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
        $producto = Producto::find($ID);
        $categoria = categoria::all(['NOMBRE','ID']);
        return view ('productos.edit',compact('ID','categoria'))-> with ('productos',$producto);
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
        $producto = new Producto();
        $producto=$producto->find($ID);
        error_log ($producto);
        $producto->fill($request->all());
        $producto->save();
        Flash::warning('El producto '. $producto->NOMBRE. ' ha sido editado exitosamente..');
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        //
        $producto =Producto::find($ID);
        $producto ->ESTADO = 0;
        //  $cliente->delete();
        $producto ->save();
        Flash::error('El producto '. $producto->NOMBRE.' ha sido borrado');
        return redirect()->route('productos.index');
    }
}
