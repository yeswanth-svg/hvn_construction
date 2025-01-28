@extends('layouts.admin')
@section('title', 'Reports')
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
            <h3 class="fw-bold mb-3">Reports</h3>
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

                <!-- for the land owner / developer plot details -->

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-center">
                            <h4 class="card-title text-center">Land Owner/Developer Plot Details</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Total Plots</th>
                                        <th>Registered Plots</th>
                                        <th>Mortgaged Plots</th>
                                        <th>Booked Plots</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($plots as $plot)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $plot->developer_plots }}</td>
                                        <td>{{ $plot->registered_plots }}</td>
                                        <td>{{ $plot->available_plots }}</td>
                                        <td>{{ $plot->booked_plots }}</td>
                                        <td>
                                            <div class="form-button-action">List</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
                                        <td>{{ $customer->received_amount }}</td>
                                        <td>{{ $customer->balance }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- for the customer information -->

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-center">
                            <h4 class="card-title text-center">Customer Information</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="ci" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>project name</th>
                                        <th>Plot No</th>
                                        <th>Customer Name</th>
                                        <th>Phone Number</th>
                                        <th>PAN NO</th>
                                        <th>AADHAR NO</th>
                                        <th>Address</th>
                                        <th>Market Value</th>
                                        <th>Price/Sqyd</th>
                                        <th>Price/Cent</th>
                                        <th>Total Plot Value</th>
                                        <th>Total Market Value</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customerDetails as $details)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $details->project->project_name }}</td>
                                        <td>{{ $details->plot_no }}</td>
                                        <td>{{ $details->customer_name }}</td>
                                        <td>{{ $details->phone_number }}</td>
                                        <td>{{ $details->pan_no }}</td>
                                        <td>{{ $details->aadhaar_no }}</td>
                                        <td>{{ $details->address }}</td>
                                        <td>{{ $details->market_value_per_sqyd }}</td>
                                        <td>{{ $details->price_per_sqyd }}</td>
                                        <td>{{ $details->price_per_cent }}</td>
                                        <td>{{ $details->total_plot_value }}</td>
                                        <td>{{ $details->total_market_value }}</td>
                                        <td>{{ $details->status }}</td>

                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('admin.print', $details->id) }}" target="_blank"
                                                    class="btn btn-primary">
                                                    Print
                                                </a>
                                            </div>
                                        </td>


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
        $('#add-row').DataTable({
            dom: 'Blfrtip',
            buttons: [
                { extend: 'excelHtml5', title: 'Plot Details', className: 'btn btn-success' },
                { extend: 'csvHtml5', title: 'Plot Details', className: 'btn btn-primary' },
                { extend: 'pdfHtml5', title: 'Plot Details', className: 'btn btn-danger', orientation: 'landscape', pageSize: 'A4' }
            ],
            responsive: true,
            pageLength: 10,
            saveState: true,

        });

        $('#fi').DataTable({
            dom: 'Blfrtip',
            buttons: [
                { extend: 'excelHtml5', title: 'Financial Statement', className: 'btn btn-success' },
                { extend: 'csvHtml5', title: 'Financial Statement', className: 'btn btn-primary' },
                { extend: 'pdfHtml5', title: 'Financial Statement', className: 'btn btn-danger', orientation: 'landscape', pageSize: 'A4' }
            ],
            responsive: true,
            pageLength: 25,
            saveState: true,

        });

        $('#ci').DataTable({
            dom: 'Blfrtip',
            buttons: [
                { extend: 'excelHtml5', title: 'Customer Information', className: 'btn btn-success' },
                { extend: 'csvHtml5', title: 'Customer Information', className: 'btn btn-primary' },
                { extend: 'pdfHtml5', title: 'Customer Information', className: 'btn btn-danger', orientation: 'landscape', pageSize: 'A4' }
            ],
            responsive: true,
            pageLength: 25,
            saveState: true,
            scrollX: true,  // Enables horizontal scrolling
            autoWidth: true,  // Prevents auto-adjusting column widths
            fixedHeader: false, // Keeps the header fixed while scrolling

        });


    });

</script>

@endsection