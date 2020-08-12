@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
      <div class="col-md-12 mt-2 text-right">

        <a href="{{route('clientes.index')}}">
          <button type="button" class="btn btn-info btn-large" name="button">Volver</button>
        </a>

      </div>
      <div class="col-md-12 mt-2">
          <div class="card">
              <div class="card-header">{{ __('Crear cliente') }}</div>

                <div class="card-body">
                    <form class="form" action="{{route('clientes.store')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="representante">Representante</label>
                        <input type="text" name="representante" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <input type="text" name="empresa" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="rut">RUT</label>
                        <input type="text" name="rut" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" name="correo" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="number" name="telefono" class="form-control">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-large" name="submit">Crear Cliente</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
