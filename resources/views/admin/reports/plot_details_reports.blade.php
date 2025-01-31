@extends('layouts.admin')
@section('title', 'Land Owner / Developer Plot Detials')
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
            <h3 class="fw-bold mb-3">Land Owner / Developer Plot Detials</h3>
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

                { extend: 'pdfHtml5', title: 'Plot Details', className: 'btn btn-danger', orientation: 'landscape', pageSize: 'A4' }
            ],
            responsive: true,
            pageLength: 10,
            saveState: true,

        });


    });

</script>

@endsection