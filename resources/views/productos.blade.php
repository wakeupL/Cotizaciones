
@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
      <div class="col-md-12 mt-2 text-right">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoProducto">
          + Nuevo Producto
        </button>

        <!-- Modal -->
        <div class="modal fade" id="nuevoProducto" tabindex="-1" aria-labelledby="nuevoProducto" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="nuevoProducto">Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{route('productos.store')}}" method="post">
              <div class="modal-body">

                  @csrf
                  <div class="form-group text-left">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" name="nombre" class="form-control">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              </form>
            </div>
          </div>
        </div>

      </div>

      <div class="col-md-12 mt-2">
          <div class="card">
              <div class="card-header">{{ __('Productos') }}</div>

                <div class="card-body">

                    <table class="display table table-bordered" id="productos">
                      <thead>
                        <tr>
                          <th>Producto</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($productos as $producto)
                        @if($producto->estado == 0)
                        <tr>
                          <td>{{$producto->producto}}</td>
                          <td class="text-center">
                            <!-- editar producto -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarProducto">
                              Editar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="editarProducto" tabindex="-1" aria-labelledby="editarProducto" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editarProducto">Editar Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="{{route('productos.update', $producto->id)}}" method="post">
                                  <div class="modal-body">
                                      @method('PATCH')
                                      @csrf
                                      <div class="form-group text-left">
                                        <input type="hidden" name="id" value="{{$producto->id}}">
                                        <label for="nombre">Nombre del Producto</label>
                                        <input type="text" name="nombre" class="form-control" value="{{$producto->producto}}">
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- editar producto -->
                            <a href="{{route('productos.destroy', $producto->id)}}" class="btn btn-sm btn-danger">Eliminar</a>
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
