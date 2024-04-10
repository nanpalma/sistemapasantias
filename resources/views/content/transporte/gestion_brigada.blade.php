@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    {{-- <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets_use/compiled/css/table-datatable-jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_use/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_use/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection



@section('page-script')
    {{-- <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script> --}}
@endsection

@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>


    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading h-100">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $brigada->nombre }}</h3>
                        <p class="text-subtitle text-muted">Aqui se encuentra todos los vhiculos disponibles.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $brigada->nombre }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">

                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">
                            Lista De Vehículos
                        </h5>
                        <div>
                            <button type="button" id="addModalMaterial" class="btn btn-outline-success"
                                data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Nuevo
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="" class="table-responsive pt-2">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th class="text-center">VEHÍCULO DE TRASPORTE
                                            SISTEMA BLINDADOS Y SISTEMAS DE ARTILLERÍA
                                        </th>
                                        <th class="text-center">SERIAL O PLACA</th>
                                        <th class="text-center">OPR</th>
                                        <th class="text-center">REP</th>
                                        <th class="text-center">INO</th>
                                        <th>OBSERVACIÓN</th>
                                        <th class="text-end"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($arrayData as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->vehiculos->nombre }}</td>
                                            <td class="text-center">{{ $value->vehiculos->placa }}</td>

                                            <td class="text-center">
                                                @if ($value->operativo)
                                                    <input type="checkbox" class="form-check-input form-check-info"
                                                        checked="" name="customCheck" id="customColorCheck5">
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($value->reparado)
                                                    <input type="checkbox" class="form-check-input form-check-info"
                                                        checked="" name="customCheck" id="customColorCheck5">
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($value->inoperativo)
                                                    <input type="checkbox" class="form-check-input form-check-info"
                                                        checked="" name="customCheck" id="customColorCheck5">
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td>
                                                <p class="mb-0">{{ $value->observacion }}</p>
                                            </td>
                                            <td class="text-end">
                                                <div class="btn-group mb-1">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                            id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Opciones
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"
                                                                onclick="editMaterial({{ $value->id }})">Editar</a>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="deletMaterial({{ $value->id }})">Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </section>
            <!-- Basic Tables end -->

        </div>

    </div>
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog    modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Registrar Material en <b>{{ $brigada->nombre }}</b>
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('transporte.gestion.store') }}" method="POST" id="formAddStore">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="brigadas_id" id="brigadas_id" value="{{ $brigada->id }}">
                    <input type="hidden" name="id_departamento" id="id_departamento" value="2">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-12 mb-4 ocult_elemet">
                                <div class="form-group mb-0 ">
                                    <label for="materiale_id">VEHÍCULO DE TRASPORTE</label>
                                    <select name="vehiculo_id" id="vehiculo_id"
                                        class=" form-select form-select-md list_select_material">
                                    </select>
                                </div>
                                <span class="text-danger">
                                    <strong id="vehiculo_id-error"></strong>
                                </span>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input form-check-input-lg" type="radio"
                                            name="capa_ope" checked id="flexRadioDefault1" value="operativo">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            OPE
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="capa_ope"
                                            id="flexRadioDefault2" value="reparado">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            REP
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="capa_ope"
                                            id="flexRadioDefault3" value="inoperativo">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            INO
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group mb-3 ">
                                    <label for="observacion" class="form-label">Observación</label>
                                    <textarea class="form-control" id="observacion" name="observacion" rows="5"></textarea>
                                    <div id="observacion-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cerrarModalMa" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Cerrar</span>
                        </button>
                        <button id="btn_add_stock_modal" type="button" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Guardar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('vendor-script')
    {{-- <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script> --}}

    <script src="{{ asset('assets_use/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets_use/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets_use/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>




    <script src="{{ asset('assets_use/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_use/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets_use/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets_use/static/js/pages/datatables.js') }}"></script>

    <script src="{{ asset('assets_use/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets_use/static/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/general.js') }}"></script>
    <script src="{{ asset('transporte/gestion_brigada.js') }}"></script>

@endsection
