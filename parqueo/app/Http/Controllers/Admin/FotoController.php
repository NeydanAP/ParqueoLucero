<?php

namespace Park\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Park\Http\Requests;
use Park\Http\Requests\SaveFotoRequest;
use Park\Http\Controllers\Controller;

use Park\Foto;
use Park\Album;
use Carbon\Carbon;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = Foto::orderBy('id', 'desc')->paginate(5);
        //dd($products);
        return view('admin.foto.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::orderBy('id', 'desc')->lists('nombre', 'id');
        //dd($categories);
        return view('admin.foto.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveFotoRequest $request)
    {
        $imag= $request->file('imag');
        $imagen = '/public/fotos/';
        $nombre = sha1(Carbon::now()).'.'.$imag->guessExtension();
        $imag->move(getCwd().$imagen,$nombre);

        Foto::create
        (
            [
            'nombre'        => $request->get('nombre'),
            'descripcion'   => $request->get('descripcion'),
            'extract'       => $request->get('extract'),
            'slug'          => str_slug($request->get('nombre')),
            'precio'         => $request->get('precio'),
            'imagen' =>$imagen.$nombre,
            'album_id'   => $request->get('album_id')
           ]
        );
       

       
        return redirect()->route('admin.foto.index')->with('message', 'La foto ha sido subida');


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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
