@extends('layouts.admin')
@section('title', 'Financial Reports')
@section('content')


<style>
    /* Add margin to the page length dropdown */
    .dataTables_wrapper .dataTables_length {
        margin-left: 10px;
        /* Adjust space between the page length dropdown and the table */
    }

    /* Add margin to the buttons */
    .dataTables_wrapper .dt-buttons {
        margin-right: 10px;
        /* Adjust the space between buttons and page length dropdown */
    }

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

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Financial Reports</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">All Reports</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">



                <!-- for the financial information -->

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-center">
                            <h4 class="card-title text-center">Financial Statement</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="fi" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Plot No</th>
                                        <th>Customer Name</th>
                                        <th>Payment Details</th>
                                        <th>Recevied Amount</th>
                                        <th>Balance</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customer->plot_no }}</td>
                                        <td>{{$customer->customer_name}}</td>
                                        <td>
                                            @if($customer->payments->isNotEmpty())
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Payment Date</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($customer->payments as $payment)
                                                            <tr>
                                                                <td>{{ formatDate($payment->payment_date) }}</td>
                                                                <td>{{ formatCurrency($payment->amount) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <span>No Payments</span>
                                            @endif
                                        </td>


                                        <td>{{ $customer->received_amount }}</td>
                                        <td>{{ $customer->balance }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>




<!-- Initialize DataTable -->
<script>
    $(document).ready(function () {
        var table = $('#fi').DataTable({
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Financial Statement',
                    className: 'btn btn-success',
                    customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];

                        $('row c[r]', sheet).attr('s', '55'); // Apply formatting

                        $('#fi tbody tr').each(function (index) {
                            var paymentCell = $(this).find('td:eq(3)'); // 4th column (Payment Details)
                            var payments = [];

                            // Extract payment data from nested table
                            paymentCell.find('table tbody tr').each(function () {
                                var date = $(this).find('td:eq(0)').text().trim();
                                var amount = $(this).find('td:eq(1)').text().trim();
                                payments.push(date + " | " + amount);
                            });

                            // Generate formatted text for Excel
                            var formattedPaymentDetails = payments.length
                                ? "Date | Amount\n-----------------\n" + payments.join("\n")
                                : "No Payments";

                            // Modify only if payments exist
                            var targetCell = $(sheet).find('row').eq(index + 2).find('c[r^="D"] t');
                            if (payments.length) {
                                targetCell.text(formattedPaymentDetails);
                            } else {
                                targetCell.text(formattedPaymentDetails);
                            }
                        });
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Financial Statement',
                    className: 'btn btn-danger',
                    orientation: 'landscape',
                    pageSize: 'A4'
                }
            ],
            responsive: true,
            pageLength: 25,
            saveState: true,
        });
    });

</script>

@endsection