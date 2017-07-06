<?php

namespace Park\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Park\Http\Requests;
use Park\Http\Controllers\Controller;
use Park\Http\Requests\EmpresaRequest;
use Park\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::orderBy('id', 'desc')->paginate(10);
        //dd($empresas);
        return view('admin.empresa.index',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $data = [
            'nit'    => $request->get('nit'),
            'nombre'     => $request->get('nombre'),
            'ciudad'     => $request->get('ciudad'),
            'direccion'    =>$request->get('direccion'),
            'telefono'    => $request->get('telefono')
        ];
        $empresa = Empresa::create($data);
        $message = $empresa ? 'Empresa agregado correctamente!' : 'Empresa NO pudo agregarse!';
        
        return redirect()->route('admin.empresa.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return $empresa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('admin.empresa.edit',compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $empresa->fill($request->all());
        
        $updated = $empresa->save();
        
        $message = $updated ? 'Empresa actualizado correctamente!' : 'Empresa NO pudo actualizarse!';
        
        return redirect()->route('admin.empresa.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $deleted = $empresa->delete();
        
        $message = $deleted ? 'Empresa eliminado correctamente!' : 'Empresa NO pudo eliminarse!';
        
        return redirect()->route('admin.empresa.index')->with('message', $message);
    
    }
}
