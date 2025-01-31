@extends('layouts.admin')
@section('title', 'Each Plot Information')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Each Plot Information</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.each-plot-information.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.each-plot-information.index') }}">Each Plot Information</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Information</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white">
                        <h4 class="card-title"><i class="fas fa-info-circle"></i> Plot Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="fw-bold fs-5 text-secondary">Project Name</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->project->project_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="plot_no" class="form-label fs-5 fw-bold text-secondary">Plot No</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->plot_no }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="ownership" class="form-label fs-5 fw-bold text-secondary">Ownership</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->ownership }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label fs-5 fw-bold text-secondary">Name</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->name }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="geo_coordinates_n" class="form-label fs-5 fw-bold text-secondary">Geo
                                    Coordinates
                                    N</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->geo_coordinates_n }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="geo_coordinates_e" class="form-label fs-5 fw-bold text-secondary">Geo
                                    Coordinates
                                    E</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->geo_coordinates_e }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="plot_area_sq_yds" class="form-label fs-5 fw-bold text-secondary">Plot Area
                                    (sq.
                                    yds)</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->plot_area_sq_yds }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="plot_area_cents" class="form-label fs-5 fw-bold text-secondary">Plot Area
                                    (cents)</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->plot_area_cents }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="facing" class="form-label fs-5 fw-bold text-secondary">Facing</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->facing }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="size_east" class="form-label fs-5 fw-bold text-secondary">Size
                                    (East)</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->size_east }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="size_west" class="form-label fs-5 fw-bold text-secondary">Size
                                    (West)</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->size_west }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="size_north" class="form-label fs-5 fw-bold text-secondary">Size
                                    (North)</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->size_north }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="size_south" class="form-label fs-5 fw-bold text-secondary">Size
                                    (South)</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->size_south }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="plot_availability_for_sale" class="form-label fw-bold text-secondary">Plot
                                    Availability for Sale</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $epi->plot_availability_for_sale}}</p>
                            </div>
                        </div>




                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('admin.each-plot-information.index') }}" class="btn btn-secondary me-2">
                                <i class="icon-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>

@endsection