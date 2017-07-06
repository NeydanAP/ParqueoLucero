<?php

namespace Park\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Park\Http\Requests;

use Park\Http\Requests\TarifaRequest;
use Park\Http\Controllers\Controller;
use Park\Tarifa;
use Park\Clase;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifas = Tarifa::all();
        //dd($tarifas);
        return view('admin.tarifa.index',compact('tarifas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clases = Clase::orderBy('id', 'desc')->lists('descripcion', 'id');
        return view('admin.tarifa.create',compact('clases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarifaRequest $request)
    {
        $data = [
            'val_hora'    => $request->get('val_hora'),
            'val_dia'     => $request->get('val_dia'),
            'val_mes'     => $request->get('val_mes'),
            'clase_id'    => $request->get('clase_id')
        ];
        $tarifa = Tarifa::create($data);
        $message = $tarifa ? 'Tarifa agregado correctamente!' : 'Tarifa NO pudo agregarse!';
        
        return redirect()->route('admin.tarifa.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tarifa $tarifa)
    {
        return $tarifa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarifa $tarifa)
    {
      

        $clases = Clase::orderBy('id', 'desc')->lists('descripcion', 'id');
        return view('admin.tarifa.edit',compact('clases','tarifa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TarifaRequest $request, Tarifa $tarifa)
    {
        $tarifa->fill($request->all());
        
        $updated = $tarifa->save();
        
        $message = $updated ? 'Tarifa actualizado correctamente!' : 'Tarifa NO pudo actualizarse!';
        
        return redirect()->route('admin.tarifa.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarifa $tarifa)
    {
        $deleted = $tarifa->delete();
        
        $message = $deleted ? 'Tarifa eliminado correctamente!' : 'Tarifa NO pudo eliminarse!';
        
        return redirect()->route('admin.tarifa.index')->with('message', $message);
    }
}
