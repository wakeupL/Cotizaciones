<html>
@foreach ($datos as $dato)
        
@endforeach
    <head>
        <title>Cotizacion N° {{$dato->id}} - PorSalud</title>
        <style>
            .contenedor {
                padding: 5em 5em 5em 2em;
            }
            .border-info {
                border:2px solid #000;
            }
            .top {
                padding-top: 20px; 
            }
            .borde {
                border: 1px solid #000;
                border-radius: 5px;
            }
            .space {
                padding-top: 10px;
            }
            .box-padding {
                padding: 10px;
            }
            table tr th td {
                text-decoration: none;
            }
            .pad{
                padding-top: 8px;
            }
            
        </style>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="contenedor">
        
        
 
        <div class="container">
            <!-- Header -->
            <div class="row">
                <div class="col-md-3">
                    <img width="270px" height="120px" src="{{ asset('img/logo.png') }}" alt=""> 
                </div>

                <div class="col-md-6 text-center">
                    <b>Com. e Imp. Isidora Fernanda Pacheco Araya EIRL<br>
                    77.077.153-6 <br>
                    Dr. Manuel Barros Borgoño 71 Of. 1105 <br>
                    Providencia, Región Metropolitana.</b>
                </div>

                <div class="col-md-3 text-center border-info">
                    <br><b> Cotización</b>  <br>
                    <b style="color:red;">N°: {{$dato->id}} </b>
                </div>
            </div>
            <!-- Header -->

            <!-- Fecha -->
            <div class="row text-right pad">
                <div class="col-md-12">
                    <b>Fecha:&nbsp;&nbsp;</b>{{$dato->created_at}}
                </div>
            </div>
            <!-- Fecha -->

            <div class="space"></div>
            <!-- Informacion cliente -->
            <div class="row borde box-padding">
                
                    <div class="col-md-6">
                        <table class=" table-borderless">
                            <tr>
                                <th>Cliente: </th>
                                <td>{{$dato->nombre}}</td>
                            </tr>
                            <tr>
                                <th>RUT: &nbsp;&nbsp;</th>
                                <td>{{$dato->rut}}</td>
                            </tr>
                            <tr>
                                <th>E-mail:</th>
                                <td>{{$dato->correo}}</td>
                            </tr>
                        </table>
                         
                    </div>
                    <div class="col-md-6">
                        <table class="table-borderless">
                            <tr>
                                <th>Dirección:&nbsp;&nbsp;</th>
                                <td>{{$dato->direccion}}</td>
                            </tr>
                            <tr>
                                <th>Teléfono:</th>
                                <td>{{$dato->telefono}}</td>
                            </tr>
                        </table>
                    </div>
                
            </div>
            <!-- Informacion cliente -->

            <!-- Mensaje 1 -->
            <div class="row">
                <div class="col-md-12 pad">
                <p>Estimado/a Sr/Sra. {{$dato->nombre}}<br>
                Ha solicitado información sobre los precios de nuestra compañía. A continuación, aparece nuestro presupuesto:</p>
                </div>
            </div>
            <!-- Mensaje 1 -->
            
            <!-- Detalle -->
            <div class="row borde box-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Valor Unitario</th>
                            <th>Total Neto</th>
                            <th>Plazo de entrega</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php

                        $subtotal = 0;
                        $impuesto = 0;
                        @endphp
                        @foreach ($listitem as $item)
                        <tr>
                            <td>{{$item->producto}}</td>
                            <td>{{$item->cantidad}}</td>
                            <td>{{$item->precio}}</td>
                            <td>{{$item->total_neto}}</td>
                            <td>{{$item->entrega}} días hábiles.</td>
                        </tr>
                        @php
                        $subtotal = $item->total_neto + $subtotal;
                        
                        
                        @endphp
                        @endforeach
                        @php
                        $impuesto = $subtotal * 0.19;
                        $total = $subtotal + $impuesto;
                        @endphp
                        <tr align="right">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>SUBTOTAL: 
                                @php
                                    echo '<b>$ '. $subtotal. '</b>';
                                @endphp
                            </td>
                        </tr>
                        <tr align="right">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>IVA(19%): 
                                @php
                                    echo '<b>$ '. round($impuesto). '</b>';
                                @endphp
                            </td>
                        </tr>
                        <tr align="right">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>TOTAL: 
                                @php
                                    echo '<b>$ '. round($total). '</b>';
                                @endphp
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- mensaje debajo de detalle -->
                <div class="row">
                    <div class="col-md-12 pad">
                        <p>Gracias por darnos la oportunidad de ofrecerle nuestros productos. Como siempre, es un placer para
                            nosotros hacer negocios con ustedes. Esperamos hacer realidad este pedido para su completa satisfacción.</p>
                    </div>
                </div>
                <!-- mensaje debajo de detalle -->
            </div>
            <!-- Detalle -->
            <!-- Tiempo -->
            <div class="row">
                <div class="col-md-12 pad">
                    <p>Esta cotización estará válida durante 7 días hábiles desde su creación. </p>
                </div>
            </div>
            <!-- Tiempo -->
        </div>
        
    </body>
</html>