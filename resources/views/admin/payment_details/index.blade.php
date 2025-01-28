@extends('layouts.admin')
@section('title', 'Payment Details')
@section('content')
<style>
    /* For smaller screens */
    .table-responsive {

        white-space: nowrap;
        /* Prevents text wrapping inside cells */
    }

    /* Optional: Adjust cell padding for better readability on smaller screens */
    .table td,
    .table th {
        padding: 0.5rem;
    }

    .dataTables_scrollBody thead tr {
        visibility: hidden;
        /* Hides the duplicate header */
    }

    .dataTables_scrollBody thead tr th {
        height: 0;
        padding: 0;
        border: none;
        visibility: hidden;
    }
</style>
@php
    $formatter = new \NumberFormatter('en_IN', \NumberFormatter::DECIMAL);
@endphp
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Payment Details</h3>
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
                    <a href="{{ route('admin.customer-details.index') }}">
                        Customer Details
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>{{$customer->customer_name}} Payment Details</a>
                </li>
            </ul>

        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">{{$customer->customer_name}} Payment Detials</h4>

                            <button class="btn btn-primary btn-round ms-auto" id="openCreate">
                                <i class="fa fa-plus"></i>
                                Add Payment
                            </button>



                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Mode of Payment</th>
                                        <th>Details</th>
                                        <th>Name of the Bank</th>
                                        <th>Attachment</th>
                                        <th>Remarks</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($paymentsDetails as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ formatDate($payment->payment_date)}}</td>

                                        <td>{{ formatCurrency($payment->amount) }}</td>
                                        <td>{{ $payment->mode_of_payment }}</td>
                                        <td>{{ $payment->details }}</td>
                                        <td>{{ $payment->bank_name }}</td>
                                        <td>{{ $payment->attachments }}</td>
                                        <td>{{ $payment->companyAccount ? $payment->companyAccount->bank_name : 'N/A' }}
                                        </td>

                                        <td>
                                            <div class="form-button-action">

                                                <!-- <button class="btn btn-link btn-secondary show-button"
                                                    data-id="{{$payment->id}}" title="Show" id="openShow">
                                                    <i class="fa fa-eye"></i>
                                                </button> -->

                                                <button class="btn btn-link ms-auto edit-button"
                                                    data-id="{{ $payment->id }}" title="Edit" id="openEdit">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <form
                                                    action="{{ route('admin.payment-details.destroy', $payment->id) }}"
                                                    method="POST" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-link btn-danger delete-btn"
                                                        data-url="{{ route('admin.payment-details.destroy', $payment->id) }}"
                                                        data-bs-toggle="tooltip" title="Delete">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>


                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <table class="table table-striped text-center">
                                <tr>
                                    <td>Received</td>
                                    <td>{{ formatCurrency($receivedAmount) }}
                                        ({{ convertToWords($receivedAmount) }})
                                    </td>
                                </tr>
                                <tr>
                                    <td>Balance</td>
                                    <td>{{ formatCurrency($balance) }}
                                        ({{convertToWords($balance) }})</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="{{asset('js/core/jquery-3.7.1.min.js')}}"></script>
<!-- Datatables -->
<script src="{{asset('js/plugin/datatables/datatables.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#add-row').DataTable({
            scrollX: true,  // Enables horizontal scrolling
            autoWidth: true,  // Prevents auto-adjusting column widths
            fixedHeader: false, // Keeps the header fixed while scrolling
        });


        // Open the create page for 
        $('#openCreate').click(function () {
            window.location.href = '{{ route('admin.customer-details.payment-details.create', $customer->id) }}';
        });



        // Handle editing a 
        $(document).on('click', '.edit-button', function () {
            var id = $(this).data('id'); // Get the team member ID from the data-id attribute
            var editUrl = '{{ route('admin.payment-details.edit', ':id') }}'.replace(':id', id); // Replace :id with the actual ID
            window.location.href = editUrl; // Redirect to the edit page
        });

        $(document).on('click', '.show-button', function () {
            var id = $(this).data('id'); // Get the team member ID from the data-id attribute
            var showUrl = '{{ route('admin.payment-details.show', ':id') }}'.replace(':id', id); // Replace :id with the actual ID
            window.location.href = showUrl; // Redirect to the show page
        });


        // Show team member details in modal


        // Handle delete functionality
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                const form = this.closest('form'); // Get the associated form
                const deleteUrl = this.dataset.url; // Fetch the delete URL

                // SweetAlert confirmation for delete
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Deleted!",
                            "Payment has been deleted.",
                            "success"
                        );
                        form.submit(); // Submit the form if confirmed
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            "Cancelled",
                            "Your Payment is safe!",
                            "error"
                        );
                    }
                });
            });
        });
    });
</script>

@endsection