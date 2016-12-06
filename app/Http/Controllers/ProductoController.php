<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Producto;
use Laracasts\Flash\Flash;
use App\categoria;
use App\Http\Requests\ProductoRequest;


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
        //porque me sale error
        // $categoria = categoria::where('ESTADO', 1)->orderBy('NOMBRE','ASC')->paginate(5);
        $categoria = categoria::all(['NOMBRE','ID']);

          return view ('productos.create',compact('ID','categoria'));
    }

    
    
    public function store(ProductoRequest $request)
    {
                    if ($request->file('imagen')){
                            $file = $request->file('imagen');
                            $name = $file->getClientOriginalName();

                        $path =public_path().'/imagenes/productos/';
                        $file->move($path, $name);

                    }else{
                        Flash::success("Se ha registrado:  de forma Exitosa !");
                    }

        $producto = new Producto( $request ->all());
        $producto-> ESTADO = 1;
        $producto->RUTA_IMAGEN =$file->getClientOriginalName();
       
        $producto->save();

       // dd ('Cliente Creado Satisfactoriamente!!');
        Flash::success("Se ha registrado: " . $producto-> NOMBRE . " de forma Exitosa !");
        return redirect()->route('productos.index');
    
    }

    public function show($id)
    {
        //
    }


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
    public function update(ProductoRequest $request, $ID)
    {
        //
        $producto = new Producto();
        $producto=$producto->find($ID);
        error_log ($producto);
        $producto->fill($request->all());
        if(Input::hasFile('imagen')){
        $file = Input::file('imagen');
        $file->move(public_path().'/imagenes/productos/',$file->getClientOriginalName());
        $articulo->imagen=$file->getClientOriginalName();
      }
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
