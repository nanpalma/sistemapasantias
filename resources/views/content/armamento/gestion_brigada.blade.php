@extends('layouts/contentNavbarLayout')

@section('title', 'Armamento - ' . $brigada->nombre . ' ')

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
                        <p class="text-subtitle text-muted">Aqui se encuentra todos los materiales disponibles.</p>
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
                    <form action="{{ route('armamento.gestion.views') }}" method="GET">
                        <div class="card-header pb-0 pt-2">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <h6>Lista de areas</h6>
                                    <div class="input-group ">
                                        <label class="input-group-text" for="inputGroupSelect01">Filtrar Por:</label>
                                        <input type="hidden" name="b" value="{{ $brigada->id }}">
                                        <select name="a" class="form-select" id="inputGroupSelect01">
                                            <option value="">Todos las Áreas</option>
                                            @foreach ($brigada->subbrigada as $value)
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
                            Lista De Materiales
                        </h5>
                        <div>
                            <button type="button" id="addModalMaterial" class="btn btn-outline-success"
                                data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Nuevo
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Armamento</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Municiones</a>
                            </li>

                        </ul>
                        <hr class="mt-0">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div id="" class="table-responsive pt-2">
                                    <table class="table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>DESCRIPCIÓN DEL MATERIAL</th>
                                                <th class="text-center">TOE</th>
                                                <th class="text-center">DOTADO</th>
                                                <th class="text-center">FALTAN</th>
                                                <th class="text-center">OPERATIVO</th>
                                                <th class="text-center">INOPERATIVO</th>
                                                <th>OBSERVACIÓN</th>
                                                @if ($a)
                                                    <th class="text-end"></th>
                                                @endif

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($arrayData2 as $value)
                                                <tr>
                                                    <td>{{ $value->material->nombre }}</td>
                                                    <td class="text-center">{{ $value->toe <= 0 ? '--' : $value->toe }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->dotado <= 0 ? '--' : $value->dotado }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->faltan <= 0 ? '--' : $value->faltan }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->operativo <= 0 ? '--' : $value->operativo }}</td>
                                                    <td class="text-center">
                                                        {{ $value->inoperativo <= 0 ? '--' : $value->inoperativo }}</td>
                                                    <td>
                                                        <p class="mb-0">{{ $value->observacion }}</p>
                                                    </td>
                                                    @if ($a)
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
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div id="" class="table-responsive pt-5">
                                    <table class="table" id="tabletwe">
                                        <thead>
                                            <tr>
                                                <th>DESCRIPCIÓN DEL MATERIAL</th>
                                                <th class="text-center">TOE</th>
                                                <th class="text-center">DOTADO</th>
                                                <th class="text-center">FALTAN</th>
                                                <th class="text-center">OPERATIVO</th>
                                                <th class="text-center">INOPERATIVO</th>
                                                <th>OBSERVACIÓN</th>
                                                @if ($a)
                                                    <th class="text-end"></th>
                                                @endif

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($arrayData as $value)
                                                <tr>
                                                    <td>{{ $value->material->nombre }}</td>
                                                    <td class="text-center">{{ $value->toe <= 0 ? '--' : $value->toe }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->dotado <= 0 ? '--' : $value->dotado }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->faltan <= 0 ? '--' : $value->faltan }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->operativo <= 0 ? '--' : $value->operativo }}</td>
                                                    <td class="text-center">
                                                        {{ $value->inoperativo <= 0 ? '--' : $value->inoperativo }}</td>
                                                    <td>
                                                        <p class="mb-0">{{ $value->observacion }}</p>
                                                    </td>
                                                    @if ($a)
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
                                                    @endif
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
                    <h4 class="modal-title" id="myModalLabel33">Registrar Material en <b>{{ $brigada->nombre }}</b>
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('armamento.gestion.store') }}" method="POST" id="formAddStore">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="brigadas_id" id="brigadas_id" value="{{ $brigada->id }}">
                    <input type="hidden" name="id_departamento" id="id_departamento" value="1">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-12 mb-3 ocult_elemet">
                                <div class="form-group mb-0 ">
                                    <label for="materiale_id">Material</label>
                                    <select name="materiale_id" id="materiale_id"
                                        class=" form-select form-select-md list_select_material">
                                    </select>
                                </div>
                                <span class="text-danger">
                                    <strong id="materiale_id-error"></strong>
                                </span>
                            </div>
                            <div class="col-md-12 col-12 mb-3 ocult_elemet">
                                <div class="form-group mb-0">
                                    <label for="sub_brigada_id">Área</label>
                                    <select name="sub_brigada_id" id="sub_brigada_id"
                                        class=" form-select form-select-md list_select_area">
                                    </select>

                                </div>
                                <span class="text-danger">
                                    <strong id="sub_brigada_id-error"></strong>
                                </span>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="toe">TOE</label>
                                    <input type="number" value="0" id="toe"
                                        class="form-control form-control-md inputValue not-number-negative"
                                        placeholder="Ingrese el toe" name="toe">
                                    <div id="toe-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="dotado">DOTADO</label>
                                    <input type="number" value="0" id="dotado"
                                        class="form-control form-control-md inputValue not-number-negative"
                                        placeholder="Ingrese el dotado" name="dotado">
                                    <div id="dotado-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="faltan">FALTAN</label>
                                    <input type="number" value="0" readonly id="faltan"
                                        class="form-control form-control-md  not-number-negative"
                                        placeholder="Ingrese el faltan" name="faltan">
                                    <div id="faltan-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="operativo">OPERATIVO</label>
                                    <input type="number" value="0" readonly id="operativo"
                                        class="form-control form-control-md  not-number-negative"
                                        placeholder="Ingrese el operativo" name="operativo">
                                    <div id="operativo-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group mb-3">
                                    <label for="inoperativo">INOPERATIVO</label>
                                    <input type="number" value="0" id="inoperativo"
                                        class="form-control form-control-md inputValue not-number-negative"
                                        placeholder="Ingrese el inoperativo" name="inoperativo">
                                    <div id="inoperativo-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
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
    <script src="{{ asset('armamento/gestion_brigada.js') }}"></script>


@endsection
