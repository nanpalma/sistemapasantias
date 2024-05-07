@extends('layouts/contentNavbarLayout')

@section('title', 'Armamento - Materiales zody')

@section('vendor-style')
    {{-- <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets_use/compiled/css/table-datatable-jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_use/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
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
                        <h3>Materiales</h3>
                        <p class="text-subtitle text-muted">Aqui se encuentra todos los materiales disponibles de la zody.
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Lista De Materiales Zody</li>
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
                            Lista De Materiales De La zody
                        </h5>
                        <div>
                            <button type="button" id="addModalMaterial" class="btn btn-outline-success"
                                data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Nuevo Material
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="list_material" class="table-responsive">
                            {{-- <table class="table" id="table1">
              <thead>
                <tr>
                  <th>#ID</th>
                  <th>NOMBRE</th>
                  <th>ESTADO</th>
                  <th class="text-end"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Graiden</td>
                  <td>Offenburg</td>
                  <td>
                    <span class="badge bg-success">Activo</span>
                  </td>
                  <td class="text-end">
                    <div class="btn-group mb-1">
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Opciones
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Editar</a>
                          <a class="dropdown-item" href="#">Eliminar</a>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>



              </tbody>
            </table> --}}
                        </div>
                    </div>
                </div>

            </section>
            <!-- Basic Tables end -->

        </div>

    </div>
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Registrar Material
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('armamentozody.material.store') }}" method="POST" id="formAddMaterial">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre / Descripción del material</label>
                                    <input type="text" id="nombre" class="form-control form-control-lg "
                                        placeholder="Ingrese el nombre" name="nombre">
                                    <div id="nombre-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="tipo_material_id">Tipo</label>
                                    <select name="tipo_material_id" id="tipo_material_id"
                                        class="choices form-select form-select-lg">
                                        <option value="1">Armamento</option>
                                        <option value="2">Municiones</option>
                                    </select>
                                    <div id="tipo_material_id-error" class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cerrarModalMa" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Cerrar</span>
                        </button>
                        <button id="btn_add_material" type="button" class="btn btn-primary ms-1">
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

    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/general.js') }}"></script>
    <script src="{{ asset('armamento/create_arma_zody.js') }}"></script>

@endsection
