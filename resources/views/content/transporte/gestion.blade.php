@extends('layouts/contentNavbarLayout')

@section('title', 'Transporte - Gestión Blindado Y Transporte')

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
        <h3>Gestión Blindado Y Transporte</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    @forelse($brigadas as $brigada)
                        <a href="{{ route('transporte.gestion.views', ['b' => $brigada->id]) }}"
                            class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                                            <h6 class="text-muted font-semibold">{{ $brigada->nombre }}</h6>

                                        </div>
                                        <div class="col-md-12">
                                            <ul class="list-group">
                                                <li class="list-group-item active text-center">Total De Transporte</li>

                                                <li class="list-group-item "><i class="view-list-large"></i>
                                                    Total: {{ count($brigada->stocktransporte) }}</li>

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
