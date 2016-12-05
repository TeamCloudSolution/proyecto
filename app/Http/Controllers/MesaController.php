<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mesa;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Requests\mesarequest;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mesa = Mesa::where('ESTADO', 1)->orderBy('NUMERO','ASC')->paginate(5);
        return view ('mesas.index')->with ('mesas',$mesa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view ('Mesas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(mesarequest $request)
    {
        //
        $mesa = new Mesa( $request ->all());
        $mesa-> ESTADO = 1;
        $mesa->save();
        Flash::success("Se ha registrado: " . $mesa->NUMERO . " de forma Exitosa !");
        return redirect()->route('mesas.index');
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
        $mesa = Mesa::find($ID);
        return view ('mesas.edit')-> with ('mesas',$mesa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(mesarequest $request, $ID)
    {
        //
        $mesa =Mesa::find($ID);
        $mesa->fill($request->all());
        $mesa->save();
        Flash::warning('La mesa '. $mesa->NUMERO. ' ha sido editado exitosamente..');
        return redirect()->route('mesas.index');
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
        $mesa =Mesa::find($ID);
        $mesa->ESTADO = 0;
      //  $cliente->delete();
        $mesa->save();
        Flash::error('La mesa '. $mesa->NUMERO.' ha sido dado de baja'
                . ''
                . '');
        return redirect()->route('mesas.index');
    }
}
