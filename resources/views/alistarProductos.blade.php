@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-md-12 mt-2">
          <div class="card">
              <div class="card-header">{{ __('Información General') }}</div>

                <div class="card-body">
                    @foreach($infoGeneral as $info)
                      {{$info->id}}
                      {{$info->nombre}}
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>FOLIO</th>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>RUT</th>
                            <th>E-mail</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            
                          </tr>
                        </tbody>
                      </table>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
