<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\ProductosCotizacion;
use App\Cotizacion;
use Illuminate\Support\Facades\DB;
use DateTime;
use laracast\Flash;

class ProductosCotizacionController extends Controller
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infoGeneral = DB::table('clientes')
                          ->join('cotizacion', 'clientes.id','=','cotizacion.cliente')
                          ->where('cotizacion.id','=', $id)
                          ->get();
        
        $productos = DB::table('productos')->get();
        
        $listItem   = DB::table('productos_cotizacion')
                        ->where('id_cotizacion', '=', $id)
                        ->get();
        
        return view('alistarProductos', ['infoGeneral' => $infoGeneral])
                                        ->with('productos', $productos)
                                        ->with('listitem', $listItem);
    }
    
     public function addItem(Request $request)
    {
        $precio = $request->cantidad * $request->precio;

        $list = new ProductosCotizacion();
        $list->producto = $request->producto;
        $list->cantidad = $request->cantidad;
        $list->precio = $request->precio;
        $list->total_neto = $precio;
        $list->entrega = $request->plazo;
        $list->id_cotizacion = $request->id;
        $list->estado = '0';

        $list->save();

        Flash('Producto agregado correctamente.')->success();
        return redirect()->route('alistarProductos.show', $request->id);

    }
    
    public function getPdf(Request $request)
    {
        $finalizado = Cotizacion::find($request->id);
        $finalizado->estado = '3';
        $finalizado->save();
        
        $id = $request->id;

        $datos = DB::table('clientes')
                          ->join('cotizacion', 'clientes.id','=','cotizacion.cliente')
                          ->where('cotizacion.id','=', $id)
                          ->get();

        $listItem = DB::table('productos_cotizacion')
                        ->where('id_cotizacion', '=', $id)
                        ->get();

        return view('getPdf', compact('datos'))
                                    ->with('listitem', $listItem);
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
