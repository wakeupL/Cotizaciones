<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use DateTime;
use laracast\flash;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::get()->all();
        return view('productos', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $now = new datetime();
      $nuevoProducto = new Productos();
      $nuevoProducto->producto = $request->nombre;
      $nuevoProducto->estado = '0';
      $nuevoProducto->created_at = $now;

      $nuevoProducto->save();
      flash('Se ha guardado un nuevo producto.')->success();
      return redirect()->route('productos.index');
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
        $now = new datetime();
        $id = $request->id;
        $producto = Productos::find($id);
        $producto->producto = $request->nombre;
        $producto->updated_at = $now;

        $producto->save();
        flash('Se ha modificado correctamente.')->success();
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Productos::find($id);
        $producto->estado = '1';

        $producto->save();
        flash('Se ha eliminado correctamente.')->success();
        return redirect()->route('productos.index');
    }
}
