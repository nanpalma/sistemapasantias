@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"> --}}
<link rel="stylesheet" href="{{asset('assets_use/extensions/choices.js/public/assets/styles/choices.css')}}">
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
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Formulario Crear material</h3>
        <p class="text-subtitle text-muted">Aqui podras crear los materiales</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Formulario Crear Materia</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>


  <!-- // Basic multiple Column Form section start -->
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Nuevo Materiales</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <form class="form">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="first-name-column">Nombre / Descripción del material</label>
                      <input type="text" id="name" class="form-control form-control-lg" placeholder="Ingrese el nombre" name="name">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="city-column">Tipo</label>
                      <select class="choices form-select">
                        <option value="1">Armamento</option>
                        <option value="2">Municiones</option>
                      </select>
                    </div>
                  </div>


                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn icon icon-left btn-success me-2">
                      <i data-feather="check-circle"></i>
                      Guardar</button>
                    <button type="reset" class="btn icon icon-left btn-secondary"><i data-feather="info"></i> Cancelar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- // Basic multiple Column Form section end -->
</div>
@endsection
@section('vendor-script')
{{-- <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script> --}}

<script src="{{ asset('assets_use/extensions/apexcharts/apexcharts.min.js') }}"></script>


<script src="{{ asset('assets_use/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('assets_use/static/js/pages/form-element-select.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/general.js') }}"></script>
<script src="{{ asset('armamento/create_arma.js') }}"></script>
@endsection
