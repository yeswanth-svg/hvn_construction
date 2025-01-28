@extends('layouts.admin')
@section('title', 'Edit Payment Details')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Payment Detials</h3>
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
                    <a href="{{ route('admin.customer-details.payment-details.index', $customer->id) }}">
                        Payment Details
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Edit Payment</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Payment</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.payment-details.update', $payment->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="text" name="customer_id" value="{{$customer->id}}">
                            <input type="text" name="project_id" value="{{$customer->project_id}}">


                            <div class="mb-3">
                                <label for="payment_date" class="form-label fs-5 fw-bold text-secondary">Date</label>

                                <div class="mb-3">
                                    <label for="payment_date"
                                        class="form-label fs-5 fw-bold text-secondary">Date</label>

                                    <input type="date" name="payment_date" id="payment_date" class="form-control"
                                        required value="{{ old('payment_date', $payment->payment_date) }}"
                                        placeholder="Enter Date">
                                </div>

                            </div>


                            <label for="amount" class="form-label fs-5 fw-bold text-secondary">Amount
                            </label>
                            <div class="mb-3 input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" name="amount" id="amount" class="form-control" required
                                    value="{{old('amount', $payment->amount)}}" placeholder="Enter Amount">
                                <span class="input-group-text">.00</span>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label fs-5 fw-bold text-secondary">Status</label>
                                <select name="mode_of_payment" id="status" class="form-select" required>
                                    @if($customer->status == 'Cheque')
                                        <option value="Cheque" selected>Cheque</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Cash">Cash</option>
                                    @elseif($customer->status == 'UPI')
                                        <option value="UPI" selected>UPI</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Cash">Cash</option>
                                    @else
                                        <option value="Cash" selected>Cash</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Cash">Cash</option>
                                    @endif
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="details" class="form-label fs-5 fw-bold text-secondary">Details</label>
                                <input type="text" name="details" id="details" class="form-control"
                                    value="{{old('details', $payment->details)}}" placeholder="Enter Details">
                            </div>



                            <div class="mb-3">
                                <label for="bank_name" class="form-label fs-5 fw-bold text-secondary">Name of the
                                    Bank</label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control"
                                    value="{{old('bank_name', $payment->bank_name)}}" placeholder="Enter Bank Name">
                            </div>

                            @if ($payment->attachment != 'none')
                                <label for="bank_name" class="form-label fs-5 fw-bold text-secondary">Previous Attachment
                                </label>
                                <br>
                                <img src="{{asset('payment_attachment/' . $payment->attachments)}}" width="200px">

                            @endif

                            <div class="mb-3">
                                <label for="attachments"
                                    class="form-label fs-5 fw-bold text-secondary">Attachment</label>
                                <input type="file" name="attachments" id="attachments" class="form-control"
                                    value="{{old('attachments')}}" placeholder="Enter IFSC Code"
                                    accept=".jgp,.jpeg,.png">
                            </div>

                            <div class="mb-3">
                                <label for="remarks" class="form-label fs-5 fw-bold text-secondary">Project
                                    Name</label>
                                <select class="form-select" name="remarks" id="remarks" required>
                                    <option value="" disabled>Select Account</option>
                                    @foreach ($company_accounts as $account)
                                        <option value="{{ $account->id }}" {{ $payment->remarks == $account->id ? 'selected' : '' }}>
                                            {{$account->bank_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>




                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.customer-details.payment-details.index', $customer->id) }}"
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