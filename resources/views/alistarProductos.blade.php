@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- informacion general -->
    <div class="row justify-content-center">
        <div class="col-md-12 text-right">
            <a href="{{route('cotizacion.index')}}" class="btn btn-primary btn-sm">Volver</a>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">{{ __('Información General') }}</div>
                <div class="card-body">
                    @foreach($infoGeneral as $info)
                    @endforeach
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Nombre</th>
                                <th>Empresa</th>
                                <th>RUT</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Número de Contacto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$info->id}}</td>
                                <td>{{$info->nombre}}</td>
                                <td>{{$info->empresa}}</td>
                                <td>{{$info->rut}}</td>
                                <td>{{$info->correo}}</td>
                                <td>{{$info->direccion}}</td>
                                <td>{{$info->telefono}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- informacion general -->
    <!-- listado de items y agregados -->
    <div class="row justify-content-center mt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Agregar Artículos
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('add.item') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $info->id }}">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="text" name="cantidad" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="text" name="precio" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="producto">Producto</label>
                            <select name="producto" id="producto" class="form-control">
                                <option value="">-- Seleccionar Producto --</option>
                                @foreach($productos as $producto)
                                <option value="{{ $producto->producto }}">{{ $producto->producto }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="plazo">Plazo de entrega<small>(Días hábiles)</small></label>
                            <input type="text" name="plazo" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-large btn-outline btn-primary">Agregar producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Artículos
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Valor unitario</th>
                                <th>Valor total neto</th>
                                <th>Plazo de entrega</th>
                            </thead>
                            @foreach ($listitem as $item)
                            <tr>
                                <td>{{ $item->producto }}</td>
                                <td>{{ $item->cantidad }}</td>
                                <td>{{ $item->precio }}</td>
                                <td>{{ $item->total_neto }}</td>
                                <td>{{ $item->entrega }} Días hábiles.</td>
                            </tr>
                            @endforeach
                        </table>
                        <form method="POST" action="{{ route('getPdf') }}">
                            @csrf
                            <input type="hidden" value="{{ $info->id }}" name="id">
                            <button type="submit" class="btn btn-large btn-primary">
                                Generar y Finalizar Cotización
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- listado de items y agregados -->

@endsection
