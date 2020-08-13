<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use Illuminate\Support\Facades\DB;
use DateTime;
use laracast\Flash;

class ClientesController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::get()->all();
        return view('clientes', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear_cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $now = new DateTime();
      $nuevoCliente = new Clientes();
      $nuevoCliente->nombre = $request->representante;
      $nuevoCliente->empresa = $request->empresa;
      $nuevoCliente->rut = $request->rut;
      $nuevoCliente->correo = $request->correo;
      $nuevoCliente->direccion = $request->direccion;
      $nuevoCliente->telefono = $request->telefono;
      $nuevoCliente->estado = '0';
      $nuevoCliente->created_at = $now;

      $nuevoCliente->save();
      flash('Se ha creado nuevo cliente.')->success();
      return redirect()->route('clientes.index');

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
        $now = new datetime();
        $cliente = Clientes::find($id);
        $cliente->estado = '1';
        $cliente->updated_at = $now;

        $cliente->save();
        flash('Se ha eliminado el cliente correctamente.')->success();
        return redirect()->route('clientes.index');

    }
}
