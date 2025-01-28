@extends('layouts.admin')
@section('title', 'Plot Level Information Details')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Plot Level Information</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.plot-level-information.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.plot-level-information.index') }}">Plot Level Information</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Details</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white">
                        <h4 class="card-title"><i class="fas fa-info-circle"></i> Plots Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="from-label fs-5 fw-bold text-secondary">Project Name</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $plot->project->project_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="from-label fs-5 fw-bold text-secondary">Total Plots</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $plot->total_plots }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="mortgaged_plots" class="form-label fs-5 fw-bold text-secondary">Mortgaged
                                    Plots</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $plot->mortgaged_plots }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="developer_plots" class="form-label fs-5 fw-bold text-secondary">Developer
                                    Plots</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $plot->developer_plots }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="land_owner_plots" class="form-label fs-5 fw-bold text-secondary">Land Owner
                                    Plots</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $plot->land_owner_plots }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="registered_plots" class="form-label fs-5 fw-bold text-secondary">Registered
                                    Plots</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $plot->registered_plots }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="booked_plots" class="form-label fs-5 fw-bold text-secondary">Booked Plots
                                </label>
                                <p class="text-dark border rounded px-3 py-2">{{ $plot->booked_plots }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="available_plots" class="form-label fs-5 fw-bold text-secondary">Available
                                    Plots
                                </label>
                                <p class="text-dark border rounded px-3 py-2">{{ $plot->available_plots }}</p>
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('admin.plot-level-information.index') }}" class="btn btn-secondary me-2">
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