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

        </style>
    </head>
    <body>
        <header>

        </header>
        <main>
            
        <table class="table table-sm table-borderless text-center">
            <thead>
                <tr>
                    <td class="align-middle">
                        COMERCIALIZADORA AGROINDUSTRIAL DEL NORTE S.A DE C.V.
                    </td>
                    <td>
                        <small>
                            <p class="mb-0"><b>Clave:</b> <br>
                            SIC-FO-27.17</p>
                        </small>
                    </td>
                    <td>
                        <p class="mb-0"><b>Revisión:</b> <br>
                        02</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Examen Médico
                    </td>
                    <td>
                        <p class="mb-0"><b>Fecha de Revisión:</b> <br>
                        Noviembre del 2021</p>
                    </td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <p style="text-align: right;"><b>Fecha:</b> <span class="text-secondary border-bottom">{{ $fecha }}</span></p>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th colspan="3" class="text-center">
                        DATOS GENERALES
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <b>Nombre:</b> 
                        <span class="text-secondary">
                            {{ $historialMedico->pacientable->nombre }}
                        </span>
                        <span class="text-info">
                            @switch($historialMedico->pacientable_type)
                                @case('App\Models\RHDependiente')
                                    (Dependiente)
                                    @break

                                @case('App\Models\NomEmpleado')
                                    (Empleado)
                                    @break

                                @case('App\Models\Externo')
                                    (Externo)
                                    @break
                            @endswitch
                        </span>
                    </td>
                    <td>
                        <b>Edad:</b> <span class="text-secondary">{{ $edad }} años</span>
                    </td>
                    <td>
                        <b>Sexo:</b> <span class="text-secondary">{{ $historialMedico->pacientable->sexo }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
        @isset($historialMedico->antecedentesPersonalesPatologicos)
            <table class="table table-sm table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="text-center">
                            ANTECEDENTES PERSONALES PATOLÓGICOS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Cirugías:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->cirujias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espCirujias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espCirujias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Contusiones:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->contusiones }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espContusiones)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espContusiones }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Lumbalgias:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->lumbalgias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espLumbalgias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espLumbalgias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Hernias:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->hernias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espHernias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espHernias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Fracturas:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->fracturas }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espFracturas)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espFracturas }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Dorsalgias:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->dorsalgias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espDorsalgias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espDorsalgias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Hospitalizaciones:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->hospitalizaciones }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espHospitalizaciones)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espHospitalizaciones }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Esguinces:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->esguinces }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espEsguinces)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espEsguinces }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Lesiones arteriales:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->lesionesArteriales }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espLesionesArteriales)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espLesionesArteriales }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Transfusiones:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->transfusiones }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espTransfusiones)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espTransfusiones }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Luxaciones:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->luxaciones }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espLuxaciones)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espLuxaciones }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Tetanias:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->tetanias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espTetanias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espTetanias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Alergias:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->alergias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espAlergias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espAlergias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Asma:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->asma }}</span>
                        </td>
                        <td>
                            <b>Epilepsia:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->epilepsia }}</span>
                        </td>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Enfermedades dentales:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->enfDentales }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espEnfDentales)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espEnfDentales }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Enfermedades ópticas:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->enfOpticas }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espEnfOpticas)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espEnfOpticas }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Alteraciones psicológicas:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesPatologicos->altPsicologicas }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesPatologicos->espAltPsicologicas)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesPatologicos->espAltPsicologicas }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endisset
        <div style="page-break-after:always;"></div>
        @isset($historialMedico->antecedentesPersonalesNoPatologicos)
            <table class="table table-sm table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="text-center">
                            ANTECEDENTES PERSONALES NO PATOLÓGICOS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Anticonceptivos:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->anticonceptivos }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesNoPatologicos->espAnticonceptivos)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesNoPatologicos->espAnticonceptivos }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Obstetrico:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->obstetrico }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesNoPatologicos->espObstetrico)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesNoPatologicos->espObstetrico }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Menarca:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->menarca }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesNoPatologicos->espMenarca)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesNoPatologicos->espMenarca }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>Alcoholismo:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->alcoholismo }}</span>
                        </td>
                        <td colspan="2">
                            <b>Tabaquismo:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->tabaquismo }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Toxicomanías:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->toxicomanias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesNoPatologicos->espToxicomanias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesNoPatologicos->espToxicomanias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Religión:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->religion }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesNoPatologicos->espReligion)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesNoPatologicos->espReligion }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Pasatiempos:</b>
                                </div>
                                <div class="ml-auto text-secondary border rounded p-2">
                                    {{ $historialMedico->antecedentesPersonalesNoPatologicos->pasatiempos }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Tipo y RH:</b>
                                </div>
                                <div class="ml-auto text-secondary border rounded p-2">
                                    {{ $historialMedico->antecedentesPersonalesNoPatologicos->tipoYRH }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Inmunizaciones:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->inmunizaciones }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesNoPatologicos->espInmunizaciones)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesNoPatologicos->espInmunizaciones }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>Alimentación:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->alimentacion }}</span>
                        </td>
                        <td colspan="2">
                            <b>Aseo personal:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->aseoPersonal }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Deportes:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->deportes }}</span>
                                </div>
                                @isset($historialMedico->antecedentesPersonalesNoPatologicos->espDeportes)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesPersonalesNoPatologicos->espDeportes }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Baja estatura:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->bajo }}</span>
                        </td>
                        <td>
                            <b>Sobre peso:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->sobrePeso }}</span>
                        </td>
                        <td>
                            <b>Hacinamiento:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->hacinamiento }}</span>
                        </td>
                        <td>
                            <b>Promiscuidad:</b> <span class="text-secondary">{{ $historialMedico->antecedentesPersonalesNoPatologicos->promiscuidad }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endisset
        @isset($historialMedico->antecedentesHeredofamiliares)
        <div style="page-break-after:always;"></div>
            <table class="table table-sm table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="3" class="text-center">
                            ANTECEDENTES HEREDOFAMILIARES
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <b>Padres viven:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->padresViven }}</span>
                        </td>
                        <td>
                            <b>Hermanos viven:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->hermanosViven }}</span>
                        </td>
                        <td>
                            <b>Hermanas viven:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->hermanasViven }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Diabetes:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->diabetes }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espDiabetes)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espDiabetes }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Obecidad:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->obecidad }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espObecidad)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espObecidad }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Hipertensión arterial:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->hipertensionArterial }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espHipertensionArterial)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espHipertensionArterial }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Psoriasis / Vitiligo:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->psoriasisVitiligo }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espPsoriasisVitiligo)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espPsoriasisVitiligo }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Cardiopatías:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->cardiopatias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espCardiopatias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espCardiopatias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Lepra:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->lepra }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espLepra)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espLepra }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Neoplásicos:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->neoplasicos }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espNeoplasicos)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espNeoplasicos }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Fímicos:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->fimicos }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espFimicos)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espFimicos }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Tiroideos:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->tiroideos }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espTiroideos)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espTiroideos }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Psiquiátricos:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->psiquiatricos }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espPsiquiatricos)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espPsiquiatricos }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Alergias:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->alergias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espAlergias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espAlergias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Colagenopatias:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->colagenopatias }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espColagenopatias)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espColagenopatias }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Problemas mentales:</b> <span class="text-secondary">{{ $historialMedico->antecedentesHeredofamiliares->probMentales }}</span>
                                </div>
                                @isset($historialMedico->antecedentesHeredofamiliares->espProbMentales)
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $historialMedico->antecedentesHeredofamiliares->espProbMentales }}
                                    </div>
                                @endisset
                            </div>
                        </td>
                    </tr>
                    @isset($historialMedico->antecedentesHeredofamiliares->otros)
                    <tr>
                        <td colspan="3">
                            <div class="d-flex py-2">
                                <div>
                                    <b>Problemas mentales:</b>
                                </div>
                                <div class="ml-auto text-secondary border rounded p-2">
                                    {{ $historialMedico->antecedentesHeredofamiliares->otros }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endisset
                </tbody>
            </table>
        @endisset
        @isset($examenFisico)
        <div style="page-break-after:always;"></div>
            <table class="table table-sm table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="text-center">
                            EXAMEN FÍSICO
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="1">
                            <b>T.A:</b> <span class="text-secondary">{{ $examenFisico->TA }}</span>
                        </td>
                        <td colspan="1">
                            <b>F.R:</b> <span class="text-secondary">{{ $examenFisico->FR }}</span>
                        </td>
                        <td colspan="1">
                            <b>Peso:</b> <span class="text-secondary">{{ $examenFisico->peso }}</span>
                        </td>
                        <td colspan="1">
                            <b>T.C:</b> <span class="text-secondary">{{ $examenFisico->TC }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <b>Temperatura:</b> <span class="text-secondary">{{ $examenFisico->temperatura }}</span>
                        </td>
                        <td colspan="1">
                            <b>Talla:</b> <span class="text-secondary">{{ $examenFisico->talla }}</span>
                        </td>
                        <td colspan="1">
                            <b>Estado de conciencia:</b> <span class="text-secondary">{{ $examenFisico->estadoConciencia }}</span>
                        </td>
                        <td colspan="1">
                            <b>Coordinación:</b> <span class="text-secondary">{{ $examenFisico->coordinacion }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <b>Equilibrio:</b> <span class="text-secondary">{{ $examenFisico->equilibrio }}</span>
                        </td>
                        <td colspan="1">
                            <b>Marcha:</b> <span class="text-secondary">{{ $examenFisico->marcha }}</span>
                        </td>
                        <td colspan="1">
                            <b>Orientación:</b> <span class="text-secondary">{{ $examenFisico->orientacion }}</span>
                        </td>
                        <td colspan="1">
                            <b>Orientación en tiempo:</b> <span class="text-secondary">{{ $examenFisico->orientacionTiempo }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>Orientación en persona:</b> <span class="text-secondary">{{ $examenFisico->orientacionPersona }}</span>
                        </td>
                        <td colspan="2">
                            <b>Orientación en espacio:</b> <span class="text-secondary">{{ $examenFisico->orientacionEspacio }}</span>
                        </td>
                    </tr>
                    
                    @isset($examenFisico->cabeza)
                        <tr class="bg-light">
                            <th colspan="4" class="text-center">
                                CABEZA
                            </th>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Craneo:</b> <span class="text-secondary">{{ $examenFisico->cabeza->craneo }}</span>
                            </td>
                            <td colspan="1">
                                <b>Ojos:</b> <span class="text-secondary">{{ $examenFisico->cabeza->ojos }}</span>
                            </td>
                            <td colspan="1">
                                <b>Nariz:</b> <span class="text-secondary">{{ $examenFisico->cabeza->nariz }}</span>
                            </td>
                            <td colspan="1">
                                <b>Boca:</b> <span class="text-secondary">{{ $examenFisico->cabeza->boca }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Cuello:</b> <span class="text-secondary">{{ $examenFisico->cabeza->cuello }}</span>
                            </td>
                            <td colspan="2">
                                <div class="d-flex py-2">
                                    <div>
                                        <b>Observaciones:</b>
                                    </div>
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $examenFisico->cabeza->observaciones }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endisset
                    @isset($examenFisico->torax)
                        <tr class="bg-light">
                            <th colspan="4" class="text-center">
                                TÓRAX
                            </th>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Campos pulmonares:</b> <span class="text-secondary">{{ $examenFisico->torax->camposPulmonares }}</span>
                            </td>
                            <td colspan="1">
                                <b>AMP. AMPLEX.:</b> <span class="text-secondary">{{ $examenFisico->torax->ampAmplex }}</span>
                            </td>
                            <td colspan="1">
                                <b>Ruido pulmonar:</b> <span class="text-secondary">{{ $examenFisico->torax->ruidoPulmonar }}</span>
                            </td>
                            <td colspan="1">
                                <b>Trans. Voz:</b> <span class="text-secondary">{{ $examenFisico->torax->transVoz }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Área precordial:</b> <span class="text-secondary">{{ $examenFisico->torax->areaPrecordial }}</span>
                            </td>
                            <td colspan="1">
                                <b>FC.:</b> <span class="text-secondary">{{ $examenFisico->torax->FC }}</span>
                            </td>
                            <td colspan="1">
                                <b>Tono:</b> <span class="text-secondary">{{ $examenFisico->torax->tono }}</span>
                            </td>
                            <td colspan="1">
                                <b>Ritmo:</b> <span class="text-secondary">{{ $examenFisico->torax->ritmo }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="d-flex py-2">
                                    <div>
                                        <b>Observaciones:</b> <span class="text-secondary"></span>
                                    </div>
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $examenFisico->torax->observaciones }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endisset
                    @isset($examenFisico->abdomen)
                        <tr class="bg-light">
                            <th colspan="4" class="text-center">
                                ABDOMEN
                            </th>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Pared:</b> <span class="text-secondary">{{ $examenFisico->abdomen->pared }}</span>
                            </td>
                            <td colspan="1">
                                <b>Peristalsis:</b> <span class="text-secondary">{{ $examenFisico->abdomen->peristalsis }}</span>
                            </td>
                            <td colspan="1">
                                <b>Visceromagalias:</b> <span class="text-secondary">{{ $examenFisico->abdomen->visceromegalias }}</span>
                            </td>
                            <td colspan="1">
                                <b>Hernias:</b> <span class="text-secondary">{{ $examenFisico->abdomen->hernias }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="d-flex py-2">
                                    <div>
                                        <b>Observaciones:</b> <span class="text-secondary"></span>
                                    </div>
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $examenFisico->abdomen->observaciones }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endisset
                    @isset($examenFisico->extremidad)
                        <tr class="bg-light">
                            <th colspan="4" class="text-center">
                                EXTREMIDADES
                            </th>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Toraxicas:</b> <span class="text-secondary">{{ $examenFisico->extremidad->toraxicas }}</span>
                            </td>
                            <td colspan="1">
                                <b>Hombros:</b> <span class="text-secondary">{{ $examenFisico->extremidad->hombro }}</span>
                            </td>
                            <td colspan="1">
                                <b>Codos:</b> <span class="text-secondary">{{ $examenFisico->extremidad->codo }}</span>
                            </td>
                            <td colspan="1">
                                <b>Muñecas:</b> <span class="text-secondary">{{ $examenFisico->extremidad->muneca }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Pie:</b> <span class="text-secondary">{{ $examenFisico->extremidad->pie }}</span>
                            </td>
                            <td colspan="1">
                                <b>Movilidad:</b> <span class="text-secondary">{{ $examenFisico->extremidad->movilidad }}</span>
                            </td>
                            <td colspan="1">
                                <b>Pelvicas:</b> <span class="text-secondary">{{ $examenFisico->extremidad->pelvicas }}</span>
                            </td>
                            <td colspan="1">
                                <b>Cadera:</b> <span class="text-secondary">{{ $examenFisico->extremidad->cadera }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Rodillas:</b> <span class="text-secondary">{{ $examenFisico->extremidad->rodilla }}</span>
                            </td>
                            <td colspan="1">
                                <b>Tobillos:</b> <span class="text-secondary">{{ $examenFisico->extremidad->tobillo }}</span>
                            </td>
                            <td colspan="1">
                                <b>Manos:</b> <span class="text-secondary">{{ $examenFisico->extremidad->mano }}</span>
                            </td>
                            <td colspan="1">
                                <b>Fuerza:</b> <span class="text-secondary">{{ $examenFisico->extremidad->fuerza }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="d-flex py-2">
                                    <div>
                                        <b>Observaciones:</b> <span class="text-secondary"></span>
                                    </div>
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $examenFisico->extremidad->observaciones }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endisset
                    @isset($examenFisico->columnaVertebral)
                        <tr class="bg-light">
                            <th colspan="4" class="text-center">
                                COLUMNA VERTEBRAL
                            </th>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Lordosis:</b> <span class="text-secondary">{{ $examenFisico->columnaVertebral->lordosis }}</span>
                            </td>
                            <td colspan="1">
                                <b>Flexión:</b> <span class="text-secondary">{{ $examenFisico->columnaVertebral->flexion }}</span>
                            </td>
                            <td colspan="1">
                                <b>Lateralizacion:</b> <span class="text-secondary">{{ $examenFisico->columnaVertebral->lateralizacion }}</span>
                            </td>
                            <td colspan="1">
                                <b>Puntos de dolor:</b> <span class="text-secondary">{{ $examenFisico->columnaVertebral->puntosDolor }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Xifosis:</b> <span class="text-secondary">{{ $examenFisico->columnaVertebral->xifosis }}</span>
                            </td>
                            <td colspan="1">
                                <b>Extensión:</b> <span class="text-secondary">{{ $examenFisico->columnaVertebral->extension }}</span>
                            </td>
                            <td colspan="2">
                                <b>Rotación:</b> <span class="text-secondary">{{ $examenFisico->columnaVertebral->rotacion }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="d-flex py-2">
                                    <div>
                                        <b>Otros:</b> <span class="text-secondary"></span>
                                    </div>
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $examenFisico->columnaVertebral->otros }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="d-flex py-2">
                                    <div>
                                        <b>Observaciones:</b> <span class="text-secondary"></span>
                                    </div>
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $examenFisico->columnaVertebral->observaciones }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endisset
                    @isset($examenFisico->organoSentido)
                        <tr class="bg-light">
                            <th colspan="4" class="text-center">
                                ORGANOS DE LOS SENTIDOS
                            </th>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <b>Vista:</b> <span class="text-secondary">{{ $examenFisico->organoSentido->vista }}</span>
                            </td>
                            <td colspan="1">
                                <b>Oido:</b> <span class="text-secondary">{{ $examenFisico->organoSentido->oido }}</span>
                            </td>
                            <td colspan="1">
                                <b>Olfato:</b> <span class="text-secondary">{{ $examenFisico->organoSentido->olfato }}</span>
                            </td>
                            <td colspan="1">
                                <b>Tacto:</b> <span class="text-secondary">{{ $examenFisico->organoSentido->tacto }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="d-flex py-2">
                                    <div>
                                        <b>Observaciones:</b> <span class="text-secondary"></span>
                                    </div>
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $examenFisico->organoSentido->observaciones }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endisset
                </tbody>
            </table>
        @endisset
        
        @isset($examenAntidoping)
            <table class="table table-sm table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="text-center">
                            EXAMEN ANTIDOPING
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <b>Tipo:</b> <span class="text-secondary">{{ $examenAntidoping->tipo }}</span>
                        </td>
                        <td colspan="2">
                            <b>Examen:</b> <span class="text-secondary">{{ $examenAntidoping->examen }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <b>Sustancias:</b>
                        </td>
                        <td colspan="3">
                            @if($examenAntidoping->sustancias->count())
                                @foreach($examenAntidoping->sustancias as $sustancia)
                                    [<span @if($sustancia->resultado == 'Positivo') class="text-danger" @endif>{{ $sustancia->sustancia }}</span>]
                                @endforeach
                            @else
                                No se encontró ninguna sustancia
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        @endisset
        @isset($examenEmbarazo)
            <table class="table table-sm table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="text-center">
                            EXAMEN DE EMBARAZO 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <b>Tipo:</b> <span class="text-secondary">{{ $examenEmbarazo->tipo }}</span>
                        </td>
                        <td colspan="2">
                            <b>Resultado:</b> <span class="text-secondary">{{ $examenEmbarazo->resultado }}</span>
                        </td>
                    </tr>
                    @isset($examenEmbarazo->observaciones)
                        <tr>
                            <td colspan="4">
                                <div class="d-flex py-2">
                                    <div>
                                        <b>Observaciones:</b>
                                    </div>
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $examenEmbarazo->observaciones }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endisset
                </tbody>
            </table>
        @endisset
        @isset($examenVista)
            <table class="table table-sm table-borderless">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="text-center">
                            EXAMEN DE VISTA 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <b>Tipo:</b> <span class="text-secondary">{{ $examenVista->tipo }}</span>
                        </td>
                        <td colspan="1">
                            <b>¿Necesita lentes?:</b> <span class="text-secondary">{{ $examenVista->necesitaLentes }}</span>
                        </td>
                        <td colspan="1">
                            <b>¿Usa lentes?:</b> <span class="text-secondary">{{ $examenVista->usaLentes }}</span>
                        </td>
                    </tr>
                    @isset($examenEmbarazo->comentarios)
                        <tr>
                            <td colspan="4">
                                <div class="d-flex py-2">
                                    <div>
                                        <b>Comentarios:</b>
                                    </div>
                                    <div class="ml-auto text-secondary border rounded p-2">
                                        {{ $examenEmbarazo->comentarios }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endisset
                </tbody>
            </table>
        @endisset
            <div class="pie-de-pagina">
                <div class="pt-5 mt-5">
                    <div style="width: 280px; border-bottom: 1px solid black; margin: 0 auto;"></div>
                    <p class="text-center">NOMBRE Y FIRMA ENFERMERA </p>
                </div>
                <div>
                    <p>
                        <b>Nota:</b>  Declaro bajo protesta haber dicho la verdad y acepto que cualquier falsedad en los datos proporcionados serán causa de Rescición de mi contrato de trabajo,  estoy de acuerdo en usar el Equipo de Protección Personal  que la Empresa me proporcione,  asi como someterme a los exámenes de laboratorio y gabinete que la empresa juzgue pertinente, además  recibí de conformidad los resultados de mi exámen médico y las recomendaciones pertinentes. Asimismo se me informa que de requerirlo se me puede otorgar copia de mis reportes médicos, previa solicitud por escrito.
                        De la misma manera me informan que tengo todo el derecho de alegar cualquier reacción adversa para la salud o el medio ambiente proveniente de un producto, u  otro material manejado o emitido de los procesos de operación de la compañía.
                    </p>
                </div>
                <div class="pt-5 mt-5">
                    <div style="width: 280px; border-bottom: 1px solid black; margin: 0 auto;"></div>
                    <p class="text-center">NOMBRE Y FIRMA</p>
                </div>
                <p class="text-center text-justify">Hago del conocimiento que, durante mi estancia laboral con la empresa, mi estado general de salud no presento ninguna alteración.</p>
            </div>
        </main>
        <footer>

        </footer>
    </body>
</html>