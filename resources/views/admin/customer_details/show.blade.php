@extends('layouts.admin')
@section('title', 'Customer Details')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Customer Details</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.customer-details.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.customer-details.index') }}">Customer Details</a>
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
                        <h4 class="card-title"><i class="fas fa-info-circle"></i> Customer Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Project Name</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->project->project_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Plot Number</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->plot_no }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Customer Name</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->customer_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Phone Number</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->phone_number }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">PAN Number</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->pan_no }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Aadhaar Number</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->aadhaar_no }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label fs-5 fw-bold text-secondary">Address</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->address }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Market Value per Sq.Yd</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->market_value_per_sqyd }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Price per Sq.Yd</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->price_per_sqyd }}</p>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Price per Cent</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->price_per_cent }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Total Plot Value</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->total_plot_value }}</p>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Total Market Value</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->total_market_value }}</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Status</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $customer->status }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Recived Amount</label>
                                <p class="text-dark border rounded px-3 py-2">{{ formatCurrency($receivedAmount) }}</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fs-5 fw-bold text-secondary">Remaing Balance</label>
                                <p class="text-dark border rounded px-3 py-2">{{ formatCurrency($balance) }}</p>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('admin.customer-details.index') }}" class="btn btn-secondary me-2">
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