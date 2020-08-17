
@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">


      <div class="col-md-12 mt-2 text-right">

        <a href="{{route('clientes.create')}}">
          <button type="button" class="btn btn-info btn-large" name="button">+ Nuevo cliente</button>
        </a>

      </div>

      <div class="col-md-12 mt-2">
          <div class="card">
              <div class="card-header">{{ __('Cotizaciones abiertas') }}</div>

                <div class="card-body">

                    <table class="display table table-bordered" id="clientes">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Cliente</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cotizaciones as $cotizacion)
                        @if($cotizacion->estado == 0)
                        <tr>
                          <td>{{$cotizacion->id}}</td>
                          <td>{{$cotizacion->nombre}}</td>
                          <td class="text-center">
                            <a href="{{route('alistarProductos.show', $cotizacion->id)}}" class="btn btn-sm btn-info">Añadir Productos</a>
                            <a href="" onclick="return confirm('¿Estás seguro que deseas editar este cliente?')" class="btn btn-sm btn-danger">Eliminar Cliente</a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
        
        <div class="col-md-12 mt-2">
          <div class="card">
              <div class="card-header">{{ __('Cotizaciones finalizadas') }}</div>

                <div class="card-body">

                    <table class="display table table-bordered" id="cotfinish">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Cliente</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cotizaciones as $cotizacion)
                        @if($cotizacion->estado == 3)
                        <tr>
                          <td>{{$cotizacion->id}}</td>
                          <td>{{$cotizacion->nombre}}</td>
                          <td class="text-center">
                            <form action="{{route('getPdf')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$cotizacion->id}}">
                                <button type="submit" class="btn btn-large btn-primary">
                                    Ver Cotización
                                </button>
                            </form>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
