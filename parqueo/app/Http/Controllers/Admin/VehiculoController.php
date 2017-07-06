<?php

namespace Park\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Park\Http\Requests;
use Park\Http\Requests\VehiculoRequest;
use Park\Http\Controllers\Controller;
use Park\Vehiculo;
use Park\Clase;
use Park\Cliente;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $vehiculos = Vehiculo::orderBy('id', 'desc')->paginate(5);
        //dd($vehiculos);
        return view('admin.vehiculo.index',compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('id', 'desc')->lists('nombre', 'id');
        $clases = Clase::orderBy('id', 'desc')->lists('descripcion', 'id');
        return view('admin.vehiculo.create',compact('clientes','clases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehiculoRequest $request)
    {
         $data = [
            'placa'    => $request->get('placa'),
            'marca'     => $request->get('marca'),
            'color'     => $request->get('color'),
            'clase_id'    => $request->get('clase_id'),
            'cliente_id'    => $request->get('cliente_id')
        ];
        $vehiculo = Vehiculo::create($data);
        $message = $vehiculo ? 'Vehiculo agregado correctamente!' : 'Vehiculo NO pudo agregarse!';
        
        return redirect()->route('admin.vehiculo.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        return $vehiculo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        $clientes = Cliente::orderBy('id', 'desc')->lists('nombre', 'id');
        $clases = Clase::orderBy('id', 'desc')->lists('descripcion', 'id');
        return view('admin.vehiculo.edit',compact('clientes','clases','vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehiculoRequest $request, Vehiculo $vehiculo)
    {
        $vehiculo->fill($request->all());
        
        $updated = $vehiculo->save();
        
        $message = $updated ? 'Vehiculo actualizado correctamente!' : 'El vehiculo NO pudo actualizarse!';
        
        return redirect()->route('admin.vehiculo.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
         $deleted = $vehiculo->delete();
        
        $message = $deleted ? 'Vehiculo eliminado correctamente!' : 'Vehiculo NO pudo eliminarse!';
        
        return redirect()->route('admin.vehiculo.index')->with('message', $message);
    }
}
