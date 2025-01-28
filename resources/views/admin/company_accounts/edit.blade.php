@extends('layouts.admin')
@section('title', 'Edit Company Account')
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
                    <a>Edit Account</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Account</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.company-accounts.update', $account->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="bank_name" class="form-label fs-5 fw-bold text-secondary">Bank
                                    Name</label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control" required
                                    value="{{$account->bank_name}}" placeholder="Enter Project Name">
                            </div>

                            <div class="mb-3">
                                <label for="account_name" class="form-label fs-5 fw-bold text-secondary">Account
                                    Name</label>
                                <input type="text" name="account_name" id="account_name" class="form-control" required
                                    value="{{$account->account_name}}" placeholder="Enter Account Name">
                            </div>

                            <div class="mb-3">
                                <label for="account_no" class="form-label fs-5 fw-bold text-secondary">Account
                                    Number</label>
                                <input type="text" name="account_no" id="account_no" class="form-control" required
                                    value="{{$account->account_no}}" placeholder="Enter Account Number">
                            </div>

                            <div class="mb-3">
                                <label for="ifsc_code" class="form-label fs-5 fw-bold text-secondary">IFSC Code</label>
                                <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" required
                                    value="{{$account->ifsc_code}}" placeholder="Enter IFSC Code">
                            </div>


                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.company-accounts.index') }}"
                                    class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>



@endsection