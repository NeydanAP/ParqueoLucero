<?php

namespace Park\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Park\Http\Requests;
use Park\Http\Controllers\Controller;
use Park\Http\Requests\EspacioRequest;
use Park\Espacio;
use Park\Piso;

class EspacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espacios = Espacio::orderBy('id', 'desc')->paginate(5);
        //dd($products);
        return view('admin.espacio.index', compact('espacios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pisos = Piso::orderBy('id', 'desc')->lists('categoria', 'id');
        return view('admin.espacio.create',compact('pisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspacioRequest $request)
    {
         $data = [
            'numero'    => $request->get('numero'),
            'medida'     => $request->get('medida'),
            'estado'     => $request->get('estado'),
            'piso_id'    => $request->get('piso_id')
        ];
        $espacio = Espacio::create($data);
        $message = $espacio ? 'Espacio agregado correctamente!' : 'Espacio NO pudo agregarse!';
        
        return redirect()->route('admin.espacio.index')->with('message', $message);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Espacio $espacio)
    {
        return $espacio;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Espacio $espacio)
    {
      

        $pisos = Piso::orderBy('id', 'desc')->lists('categoria', 'id');
        return view('admin.espacio.edit',compact('pisos','espacio'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspacioRequest $request, Espacio $espacio)
    {
         $espacio->fill($request->all());
        
        $updated = $espacio->save();
        
        $message = $updated ? 'Espacio actualizado correctamente!' : 'Espacio NO pudo actualizarse!';
        
        return redirect()->route('admin.espacio.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Espacio $espacio)
    {
        $deleted = $espacio->delete();
        
        $message = $deleted ? 'Espacio eliminado correctamente!' : 'Tarifa NO pudo eliminarse!';
        
        return redirect()->route('admin.espacio.index')->with('message', $message);
    }
}

