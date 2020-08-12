
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
              <div class="card-header">{{ __('Clientes') }}</div>

                <div class="card-body">

                    <table class="display table table-bordered" id="clientes">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Empresa</th>
                          <th>RUT</th>
                          <th>Correo Electrónico</th>
                          <th>Dirección</th>
                          <th>Teléfono</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($clientes as $cliente)
                        @if($cliente->estado == 0)
                        <tr>
                          <td>{{$cliente->nombre}}</td>
                          <td>{{$cliente->empresa}}</td>
                          <td>{{$cliente->rut}}</td>
                          <td>{{$cliente->correo}}</td>
                          <td>{{$cliente->direccion}}</td>
                          <td>{{$cliente->telefono}}</td>
                          <td class="text-center">
                            <form class="" action="{{route('cotizacion.store')}}" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{$cliente->id}}">
                              <button type="submit" class="btn btn-sm btn-primary">Crear Cotización</button>
                            </form>
                            <a href="{{route('clientes.destroy', $cliente->id)}}" onclick="return confirm('¿Estás seguro que deseas editar este cliente?')" class="btn btn-sm btn-danger">Eliminar Cliente</a>
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
