@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    {{-- <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"> --}}
@endsection

@section('vendor-script')
    {{-- <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script> --}}

    <script src="{{ asset('assets_use/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets_use/static/js/pages/dashboard.js') }}"></script>
@endsection

@section('page-script')
    {{-- <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script> --}}
    <style>
        .card {
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.25rem;
            /* Equivalente a 20px */
        }

        .stats-icon {
            transition: transform 0.3s ease;
        }

        .stats-icon:hover {
            transform: scale(1.1);
        }
    </style>
@endsection

@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="row">
            <h3 class="col-md-6">Gestión</h3>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Gestión</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    @forelse($brigadas as $brigada)
                        <a href="{{ route('sanidad.gestion.views', ['b' => $brigada->id]) }}"
                            class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                                            <div class="stats-icon bg-info mb-2">
                                                <span class="fa-fw select-all fas text-white"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                                            <h5 class="text-muted font-semibold mb-0">{{ $brigada->nombre }}</h5>

                                        </div>
                                        <div class="col-md-12">
                                            <ul class="list-group">
                                                <li class="list-group-item active text-center">Hospitales</li>
                                                @forelse($brigada->hospitales as $area)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center ">
                                                        <div><span class="fa-fw select-all fas"></span>
                                                            {{ $area->nombre }} </div>
                                                        @if (count($area->hospitales_stock) > 0)
                                                            <span
                                                                class="badge bg-success ">{{ count($area->hospitales_stock) }}</span>
                                                        @endif
                                                    </li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>No hay productos disponibles en este momento.</p>
                    @endforelse

                </div>


            </div>

        </section>
    </div>
@endsection
