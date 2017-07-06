<?php

namespace Park\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Park\Http\Requests;
use Park\Http\Controllers\Controller;
use Park\Piso;

class PisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pisos= Piso::all();
        //dd($pisos);
        return view('admin.piso.index',compact('pisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.piso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'numero' => 'required|unique:pisos|max:5',
          'categoria' => 'required|unique:pisos|max:255',
        ]); 
        
         $piso = Piso::create([
            'numero' => $request->get('numero'),
            'categoria' => $request->get('categoria')
        ]); 
         $message = $piso ? 'Piso vehiculofue agregada correctamente!' : 'Piso NO pudo ser agregarse!';
        
        return redirect()->route('admin.piso.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Piso $piso)
    {
        return $piso;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Piso $piso)
    {
        return view('admin.piso.edit',compact('piso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piso $piso)
    {
        $this->validate($request, [
          'numero' => 'required|max:5',
          'categoria' => 'required|max:255'
        ]); 
        $piso->fill($request->all());
        
        $updated = $piso->save();
   
         $message = $piso ? 'Piso actualizado correctamente!' : 'Piso NO pudo ser actualizada!';
        
        return redirect()->route('admin.piso.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piso $piso)
    {
        $deleted = $piso->delete();
        
        $message = $deleted ? 'piso eliminada correctamente!' : 'Piso NO pudo ser eliminarse!';
        
        return redirect()->route('admin.piso.index')->with('message', $message);
    }
}
