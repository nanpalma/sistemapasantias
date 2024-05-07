@extends('layouts/contentNavbarLayout')

@section('title', 'Sanidad - Gestión MUNICIPIO ' . $brigada->nombre . '')

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
                        <h3>ESTABLECIMIENTOS DE SALUD MUNICIPIO {{ $brigada->nombre }}</h3>
                        <p class="text-subtitle text-muted">Aqui se encuentra todos los establecimientos de salud
                            disponibles.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item " aria-current="page"> <a
                                        href="{{ route('sanidad.gestion') }}">Gestión</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Municipio
                                    <span style="text-transform: lowercase;">{{ $brigada->nombre }}</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <form action="{{ route('sanidad.gestion.views') }}" method="GET">
                        <div class="card-header pb-0 pt-2">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <h6>Lista de areas</h6>
                                    <div class="input-group ">
                                        <label class="input-group-text" for="inputGroupSelect01">Filtrar Por:</label>
                                        <input type="hidden" name="b" value="{{ $brigada->id }}">
                                        <select name="a" class="form-select" id="inputGroupSelect01">
                                            <option value="">Todos los Hopitales</option>
                                            @foreach ($brigada->hospitales as $value)
                                                @if ($value->id == $a)
                                                    <option selected value="{{ $value->id }}">{{ $value->nombre }}
                                                    </option>
                                                @else
                                                    <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-outline-warning">Buscar</button>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">

                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">
                            @if ($a)
                                Lista De <span style="text-transform: lowercase;">{{ $text_table }}</span>
                            @else
                                Lista De {{ $text_table }}
                            @endif
                        </h5>
                        <div>
                            <button type="button" id="addModalMaterial" class="btn btn-outline-success"
                                data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Nuevo
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <hr class="mt-0">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div id="" class="table-responsive pt-2">
                                    <table class="table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th class="text-center">HOSPITAL</th>
                                                <th class="text-center">ESTABLECIMIENTO</th>
                                                <th class="text-center">PARROQUIA</th>
                                                <th class="text-center">TIPO</th>
                                                <th class="text-center">DIRECCIÓN</th>
                                                <th class="text-end"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($arrayData as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td class="text-center"><span
                                                            class="badge bg-secondary">{{ $value->hospitales->nombre }}</span>
                                                    </td>
                                                    <td class="text-center">{{ $value->establecimiento }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->parroquia }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->tipo }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->direccion }}</td>
                                                    <td class="text-end">
                                                        <div class="btn-group mb-1">
                                                            <div class="dropdown">
                                                                <button class="btn btn-primary dropdown-toggle me-1"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    Opciones
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
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
                    <h4 class="modal-title" id="myModalLabel33">Registrar Establecimiento de salud en
                        <b style="text-transform: lowercase;">{{ $brigada->nombre }}</b>
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('sanidad.gestion.store') }}" method="POST" id="formAddStore">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="municipios_hospitale_id" id="municipios_hospitale_id"
                        value="{{ $brigada->id }}">
                    <input type="hidden" name="id_departamento" id="id_departamento" value="4">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12 col-12 mb-3 ocult_elemet">
                                <div class="form-group mb-0">
                                    <label for="hospitale_id">Hospital del municipio <span
                                            style="text-transform: lowercase;">{{ $brigada->nombre }}</span></label>
                                    <select name="hospitale_id" id="hospitale_id"
                                        class=" form-select form-select-md list_select_area">
                                    </select>

                                </div>
                                <span class="text-danger">
                                    <strong id="hospitale_id-error"></strong>
                                </span>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="establecimiento">ESTABLECIMIENTO</label>
                                    <input type="text" id="establecimiento" class="form-control form-control-md "
                                        placeholder="Ingrese el establecimiento" name="establecimiento">
                                    <div id="establecimiento-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="parroquia">PARROQUIA</label>
                                    <input type="text" id="parroquia" class="form-control form-control-md e"
                                        placeholder="Ingrese la parroquia" name="parroquia">
                                    <div id="parroquia-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group mb-3">
                                    <label for="tipo">TIPO</label>
                                    <input type="text" id="tipo" class="form-control form-control-md "
                                        placeholder="Ingrese el tipo" name="tipo">
                                    <div id="tipo-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group mb-3 ">
                                    <label for="direccion" class="form-label">DIRECCIÓN</label>
                                    <textarea class="form-control" id="direccion" name="direccion" rows="5"></textarea>
                                    <div id="direccion-error" class="invalid-feedback">
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
    <script src="{{ asset('sanidad/gestion_hospital.js') }}"></script>


@endsection
