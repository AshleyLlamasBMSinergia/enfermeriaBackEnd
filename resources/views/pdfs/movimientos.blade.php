<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Historial médico</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- STILE -->
        <style>
            /** 
                Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
                puede ser de altura y anchura completas.
            **/
            @page {
                margin: 0cm 0cm;
            }

            /** Defina ahora los márgenes reales de cada página en el PDF **/
            body {
                margin-top: 0.5cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 0.5cm;

                font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;      
                
                text-align: justify;
            }

            /** Definir las reglas del encabezado **/
            header {
                position: fixed;
                top: 2cm;
                left: 2cm;
                right: 2cm;
                height: 4cm;
            }

            /** Definir las reglas del pie de página **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }

        th, td {
            /* padding: 0px !important; */
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            font-size: 12px;
        }

        p{
            font-size: 12px;
        }

        .pie-de-pagina {
            position: fixed;
            bottom: 0;
            left: 0;
            margin: 1.5cm;
        }

        .text-pink{
            color: #c72158;
        }

        </style>
    </head>
    <body>
        <header>

        </header>
        <main>
            @foreach ($movimientos as $i => $movimiento)
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr class="text-center">
                            <th colspan="3">
                                <h5>
                                    {{ $movimiento['movimiento']->tipoDeMovimiento->tipoDeMovimiento }}
                                </h5>
                            </th>
                        </tr>
                        <tr class="text-center h3">
                            <th>
                                <b class="text-pink">Folio:</b> {{ $movimiento['movimiento']['id'] }}
                            </th>
                            <th>
                                <b>Fecha:</b> {{ $movimiento['movimiento']['fecha'] }}
                            </th>
                            <th>
                                <b>Almacén:</b> {{$movimiento['movimiento']['inventario']['nombre'] }}
                            </th>
                        </tr>
                        <tr class="text-center border-top border-bottom">
                            <th scope="col">Lote</th>
                            <th scope="col">Unidades</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimiento['insumos'] as $nombreInsumo => $insumo)
                            <tr>
                                <td colspan="3" class="group-header bg-white">
                                    <b class="text-pink">{{$nombreInsumo}}</b>
                                    <small>{{ $movimiento['movimiento']->tipoDeMovimiento->clave }}</small>
                                </td>
                            </tr>
                            @php
                                $totalUnidades = 0;
                                $totalPrecios = 0;
                            @endphp
                            @foreach ($insumo as $item)
                                <tr>
                                    <td>{{ $item['lote']['lote'] }}</td>
                                    <td class="text-center">{{ $item['unidades'] }}</td>
                                    <td class="text-center">${{ $item['precio'] }}</td>
                                </tr>
                                @php
                                    $totalUnidades += $item['unidades'];
                                    $totalPrecios += $item['precio'];
                                @endphp
                            @endforeach
                            <tr class="bg-white">
                                <td class="text-right">
                                    <small><b>Total:</b></small>
                                </td>
                                <td class="border-top text-center">
                                    {{ $totalUnidades }}
                                </td>
                                <td class="border-top text-center">
                                    ${{ $totalPrecios }} MXN
                                </td>
                            </tr>
                            <br>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </main>
        <footer>

        </footer>
    </body>
</html>