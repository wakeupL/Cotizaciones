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
                      {{$info->empresa}}
                      {{$info->rut}}
                      {{$info->direccion}}
                      {{$info->telefono}}
                      {{$info->correo}}
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
