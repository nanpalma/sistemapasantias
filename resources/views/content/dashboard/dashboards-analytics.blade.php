@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Bienvenidos')

@section('vendor-style')
    {{-- <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"> --}}
@endsection

@section('vendor-script')
    {{-- <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script> --}}

    <script src="{{ asset('public/assets_use/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/assets_use/static/js/pages/dashboard.js') }}"></script>
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

    <div class="page-heading">
        <h3>Bienvenido De Gestión De Inventario</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ZODI (Zona Operativa De Defensa Integral)</h4>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('img/zaodi_lara.jpg') }}" class="mr-auto" alt="Logo de la empresa"
                            srcset="">
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
