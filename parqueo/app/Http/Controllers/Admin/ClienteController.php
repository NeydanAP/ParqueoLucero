<?php

namespace Park\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Park\Http\Requests;
use Park\Http\Controllers\Controller;
use Park\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'desc')->paginate(5);
        //dd($products);
        return view('admin.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente.create');
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
          'nombre' => 'required|unique:clientes|max:255',
          'apellido' => 'required|unique:clientes|max:255'
        ]); 
        
         $cliente = Cliente::create([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'telefono' => $request->get('telefono')
        ]); 
         $message = $cliente ? 'Cliente agregada correctamente!' : 'Cliente NO pudo ser agregarse!';
        
        return redirect()->route('admin.cliente.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('admin.cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $this->validate($request, [
          'nombre' => 'required|max:255',
          'apellido' => 'required|max:255'
        ]); 
        $cliente->fill($request->all());
        
        $updated = $cliente->save();
   
         $message = $cliente ? 'Cliente actualizado correctamente!' : 'Cliente NO pudo ser actualizada!';
        
        return redirect()->route('admin.cliente.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $deleted = $cliente->delete();
        
        $message = $deleted ? 'Cliente eliminada correctamente!' : 'Cliente NO pudo ser eliminarse!';
        
        return redirect()->route('admin.cliente.index')->with('message', $message);
    }
}
