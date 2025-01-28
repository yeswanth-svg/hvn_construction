@extends('layouts.admin')
@section('title', 'Company Account Details')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Company Accounts</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.company-accounts.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.company-accounts.index') }}">Company Accounts</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Accounts</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white">
                        <h4 class="card-title"><i class="fas fa-info-circle"></i>Account Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="fs-5 fw-bold text-secondary">Bank Name</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $account->bank_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="fs-5 fw-bold text-secondary">Account Name</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $account->account_name }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="fs-5 fw-bold text-secondary">Account Number</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $account->account_no }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="fs-5 fw-bold text-secondary">IFSC Code</label>
                                <p class="text-dark border rounded px-3 py-2">{{ $account->ifsc_code }}</p>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('admin.company-accounts.index') }}" class="btn btn-secondary me-2">
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