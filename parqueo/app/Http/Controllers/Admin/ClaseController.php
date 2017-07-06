<?php

namespace Park\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Park\Http\Requests;
use Park\Http\Controllers\Controller;
use Park\Clase;
use Session;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = Clase::all();
        //dd($clases);
        return view('admin.clase.index',compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
          'descripcion' => 'required|unique:clases|max:255',
        ]); 
        
         $clase = Clase::create([
            'descripcion' => $request->get('descripcion')
        ]); 
         $message = $clase ? 'Tipo de vehiculofue agregada correctamente!' : 'Laclase NO pudo ser agregarse!';
        
        return redirect()->route('admin.clase.index')->with('message', $message);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        return $clase;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {

        return view('admin.clase.edit',compact('clase'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
        $this->validate($request, [
          'descripcion' => 'required|max:255',
          
        ]);
        $clase->fill($request->all());
        
        $updated = $clase->save();
        
        $message = $updated ? 'Clase actualizada correctamente!' : 'La clase NO pudo actualizarse!';
        
        return redirect()->route('admin.clase.index')->with('message', $message);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        $deleted = $clase->delete();
        
        $message = $deleted ? 'Clase de vehiculo eliminada correctamente!' : 'La clase de vehiculo NO pudo ser eliminarse!';
        
        return redirect()->route('admin.clase.index')->with('message', $message);
    }
}
