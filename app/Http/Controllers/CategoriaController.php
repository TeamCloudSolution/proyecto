<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\categoria;
use Laracasts\Flash\Flash;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = categoria::where('ESTADO', 1)->orderBy('NOMBRE','ASC')->paginate(5);
        return view ('categoria.index')->with ('categoria',$categoria);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new categoria($request ->all());
        $categoria->ESTADO = 1;
        // $categoria ->DESCRIPCION=$request ->descripcion;
        $categoria -> save();
        Flash::success ("Se ha registrado : ". $categoria-> NOMBRE. " de forma de exitosa");
        return redirect ()->route('categoria.index');
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
        $categoria = categoria::find($ID);
        return view ('categoria.edit')-> with ('categoria',$categoria);
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
        $categoria = new categoria();
        $categoria=$categoria->find($ID);
        $categoria->fill($request->all());
        $categoria->save();
        Flash::warning('La categoria '. $categoria-> NOMBRE. ' ha sido editada exitosamente..');
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        // dd($id);
        // $categoria = new categoria();
        // error_log('eliminar');
        // $categoria =categoria::find($id) ;
        //   error_log($categoria);
        // $categoria->delete();
        // Flash::error('La categoria '. $categoria -> NOMBRE. ' ha sido borrada exitosamente...');
        // return redirect()->route('categoria.index');

         $categoria =categoria::find($ID);
         $categoria->ESTADO = 0;
        // $categoria->delete();
        $categoria->save();
        Flash::error('La categoria '. $categoria-> NOMBRE.' ha sido borrada');
        return redirect()->route('categoria.index');

    }
}
