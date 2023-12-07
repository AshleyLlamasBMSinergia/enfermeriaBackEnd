<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Receta</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- STILE -->
        <style>
            @page {
                margin: 0cm 0cm;
            }
            
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

            .imagen-de-fondo{
                position: fixed; bottom: -0px; left: 0px; width: 1122px; height: 800px; z-index:  -1000;
            }

            .profesional-nombre{
                text-align: center;
                font-size: 18;
            }

            .paciente-nombre{
                position: absolute;

                top: 199px;
                left: 262px;
            }

            .edad{
                position: absolute;

                top: 199px;
                left: 815px;
            }

            .fecha{
                position: absolute;

                top: 199px;
                left: 947px;
            }

            .peso{
                position: absolute;

                top: 232px;
                left: 142px;
            }

            .talla{
                position: absolute;

                top: 232px;
                left: 300px;
            }

            .presion-diastolica{
                position: absolute;

                top: 232px;
                left: 455px;
            }

            .glucemia-capilar{
                position: absolute;

                top: 232px;
                left: 612px;
            }

            .frecuencia-respiratoria{
                position: absolute;

                top: 232px;
                left: 765px;
            }

            .frecuencia-cardiaca{
                position: absolute;

                top: 232px;
                left: 920px;
            }

            .receta {
                position: absolute;
                width: 995px;
                top: 310px;
                left: 65px;
            }

            .telefono{
                position: absolute;

                top:398px;
                left: 20px;
            }

            .correo{
                position: absolute;

                top:398px;
                left: 210px;
            }

            .direccion{
                position: absolute;

                top:398px;
                left: 510px;
                width: 480px;
            }

            .center-div {
                display: flex;
                align-items: center;
                width: 100%;
                justify-content: space-between;
            }

            .center-div img {
                line-height: 0;
                height: auto;
            }
        </style>
    </head>
    <body>
        <header>

        </header>
        <main>
            <p class="profesional-nombre text-white pt-3">{{$consulta->profesional->nombre}}</h1>

            <div class="center-div text-white text-center">
                @isset($consulta->profesional->puesto)
                    <img width="16px" class="pt-1" src="{{ public_path('images/profesion.svg') }}" alt="receta">
                    <b class="pb-5 pr-3">{{$consulta->profesional->puesto->nombre}}</b>
                @endisset
                <img width="22px" class="pt-1" src="{{ public_path('images/cedulaProfesional.svg') }}" alt="receta">
                <b>Cédula profesional: </b>{{$consulta->profesional->cedula}}
            </div>    
    
            <p class="edad text-secondary">{{$consulta->edad}} años</p>
            <p class="paciente-nombre text-secondary">{{$consulta->pacientable->nombre}}</p>
            <p class="fecha text-secondary">{{$consulta->fecha->format('d/m/Y')}}</p>

            <p class="peso text-secondary">
                @isset($consulta->peso)
                    {{$consulta->peso}} Kg.
                @endisset
            </p>
            <p class="talla text-secondary">
                @isset($consulta->talla)
                    {{$consulta->talla}} mts.
                @endisset
            </p>
            <p class="presion-diastolica text-secondary">
                {{$consulta->presionSistolica}}
                @if ($consulta->presionSistolica || $consulta->presionDiastolica)
                    /
                @endif
                {{$consulta->presionDiastolica}}</p>
            <p class="glucemia-capilar text-secondary">
                {{$consulta->mg}}
                @if ($consulta->mg || $consulta->dl)
                    /
                @endif
                {{$consulta->dl}}
            </p>
            <p class="frecuencia-respiratoria text-secondary">
                @isset($consulta->frecuenciaRespiratoria)
                    {{$consulta->frecuenciaRespiratoria}}
                @endisset
            </p>
            <p class="frecuencia-cardiaca text-secondary">
                @isset($consulta->frecuenciaCardiaca)
                    {{$consulta->frecuenciaCardiaca}}
                @endisset
            </p>

            <div class="receta text-secondary">{!!$consulta->receta!!}</p>

            <p class="telefono text-secondary">{{$consulta->profesional->telefono}}</p>
            <p class="correo text-secondary">{{$consulta->profesional->correo}}</p>

            <p class="direccion text-secondary">
                @if($consulta->profesional->direccion)
                    @if($consulta->profesional->direccion->calle)
                        {{ $consulta->profesional->direccion->calle }},
                    @endif
                    @if($consulta->profesional->direccion->exterior)
                        {{ $consulta->profesional->direccion->exterior }},
                    @endif
                    @if($consulta->profesional->direccion->interior)
                        {{ $consulta->profesional->direccion->interior }},
                    @endif
                    @if($consulta->profesional->direccion->colonia)
                        {{ $consulta->profesional->direccion->colonia }},
                    @endif
                    @if($consulta->profesional->direccion->CP)
                        {{ $consulta->profesional->direccion->CP }},
                    @endif
                    @if($consulta->profesional->direccion->localidad)
                        {{ $consulta->profesional->direccion->localidad->nombre }}
                    @endif
                @endif
            </p>

        </main>
        <footer>

        </footer>
        <img class="imagen-de-fondo" src="{{ public_path('images/generica.jpg') }}" alt="receta">
    </body>
</html>