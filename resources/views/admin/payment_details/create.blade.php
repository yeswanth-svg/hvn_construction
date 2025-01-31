@extends('layouts.admin')
@section('title', 'Create payment')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Payment Details</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.customer-details.payment-details.index', $customer->id) }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.customer-details.payment-details.index', $customer->id) }}">Payment
                        Details</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Add Payment</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Payment</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.customer-details.payment-details.store', $customer->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{$customer->id}}">
                            <input type="hidden" name="project_id" value="{{$customer->project_id}}">

                            <div class="row">
                                <!-- First Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="payment_date"
                                            class="form-label fs-5 fw-bold text-secondary">Date</label>
                                        <input type="date" name="payment_date" id="payment_date" class="form-control"
                                            required value="{{old('payment_date')}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="amount"
                                            class="form-label fs-5 fw-bold text-secondary">Amount</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="number" name="amount" id="amount" class="form-control" required
                                                value="{{old('amount')}}" placeholder="Enter Amount">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="mode_of_payment" class="form-label fs-5 fw-bold text-secondary">Mode
                                            Of Payment</label>
                                        <select class="form-select" name="mode_of_payment" required>
                                            <option value="" selected>Select Mode</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="UPI">UPI</option>
                                            <option value="Cash">Cash</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="details"
                                            class="form-label fs-5 fw-bold text-secondary">Details</label>
                                        <input type="text" name="details" id="details" class="form-control"
                                            value="{{old('details')}}" placeholder="Enter Details">
                                    </div>
                                </div>

                                <!-- Second Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bank_name" class="form-label fs-5 fw-bold text-secondary">Name of
                                            the Bank</label>
                                        <input type="text" name="bank_name" id="bank_name" class="form-control"
                                            value="{{old('bank_name')}}" placeholder="Enter Bank Name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="attachments"
                                            class="form-label fs-5 fw-bold text-secondary">Attachment</label>
                                        <input type="file" name="attachments" id="attachments" class="form-control"
                                            accept=".jpg,.jpeg,.png">
                                    </div>

                                    <div class="mb-3">
                                        <label for="remarks"
                                            class="form-label fs-5 fw-bold text-secondary">Remarks</label>
                                        <select class="form-select" name="remarks">
                                            <option value="" selected>Select Account</option>
                                            @foreach ($company_accounts as $account)
                                                <option value="{{$account->id}}">{{$account->bank_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4 text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection