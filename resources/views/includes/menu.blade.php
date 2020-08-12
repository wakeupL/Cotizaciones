<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">PorSalud</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('clientes.index')}}">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('cotizacion.index')}}">Cotizaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('productos.index')}}">Productos</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>
