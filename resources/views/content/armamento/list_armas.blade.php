@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

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
          <h3>Armamentos</h3>
          <p class="text-subtitle text-muted">Aqui se encuentra todos los armamentos disponibles.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route('home')}}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Lista De Armamentos</li>
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
            Lista De Armamentos
          </h5>
          <div>
            <a href="{{route('armamento.create')}}" class="btn btn-secondary">Crear Nuevo</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <tr>
                  <th>SERIAL</th>
                  <th>NOMBRE</th>
                  <th>TIPO</th>
                  <th>ALMACEN</th>
                  <th>ESTADO</th>
                  <th class="text-end"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Graiden</td>
                  <td>vehicula.aliquet@semconsequat.co.uk</td>
                  <td>076 4820 8838</td>
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
                          {{-- <a class="dropdown-item" href="#">Option 3</a> --}}
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>



              </tbody>
            </table>
          </div>
        </div>
      </div>

    </section>
    <!-- Basic Tables end -->

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

@endsection
