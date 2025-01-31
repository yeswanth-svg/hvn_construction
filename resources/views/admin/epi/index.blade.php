@extends('layouts.admin')
@section('title', 'Each Plot Information')
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

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Each Plot Information</h3>
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
                    <a href="#">All plots</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Plot Data</h4>

                            <button class="btn btn-primary btn-round ms-auto" id="openCreate">
                                <i class="fa fa-plus"></i>
                                Add Plot Data
                            </button>


                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>project name</th>
                                        <th>Plot No</th>
                                        <th>Ownership</th>
                                        <th>Name</th>
                                        <th>Geo Coordinates - N</th>
                                        <th>Geo Coordinates - E</th>
                                        <th>Plot Area - Sq Yds</th>
                                        <th>Plot Area - Cents</th>
                                        <th>Facing</th>
                                        <th>Size East </th>
                                        <th>Size West</th>
                                        <th>Size North</th>
                                        <th>Size South</th>
                                        <th>Plot Availability for Sale</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($epis as $epi)
                                    
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $epi->project->project_name }}</td>
                                        <td>
                                            <a class="show-button" data-id="{{$epi->id}}"
                                                style="text-decoration:underline !important; cursor:pointer;">
                                                {{ $epi->plot_no }}</a>
                                        </td>
                                        <td>{{ $epi->ownership }}</td>
                                        <td>{{ $epi->name }}</td>
                                        <td>{{ $epi->geo_coordinates_n }}</td>
                                        <td>{{ $epi->geo_coordinates_e }}</td>
                                        <td>{{ $epi->plot_area_sq_yds }}</td>
                                        <td>{{ $epi->plot_area_cents }}</td>
                                        <td>{{ $epi->facing }}</td>
                                        <td>{{ $epi->size_east }}</td>
                                        <td>{{ $epi->size_west }}</td>
                                        <td>{{ $epi->size_north }}</td>
                                        <td>{{ $epi->size_south }}</td>
                                        <td>
                                                    @if($epi->plot_availability_for_sale === 'yes')
                                                        <span class="badge badge-success">Available</span>
                                                    @elseif($epi->plot_availability_for_sale === 'no')
                                                        <span class="badge badge-danger">Sold</span>
                                                    @elseif($epi->plot_availability_for_sale === 'mortgaged')
                                                        <span class="badge badge-warning">Mortgaged</span>
                                                    @else
                                                        <span class="badge badge-secondary">Unknown</span>
                                                    @endif
                                                </td>

                                        <td>
                                            <div class="form-button-action">

                                                <button class="btn btn-link btn-secondary show-button"
                                                    data-id="{{$epi->id}}" title="Show" id="openShow">
                                                    <i class="fa fa-eye"></i>
                                                </button>

                                                <button class="btn btn-link ms-auto edit-button"
                                                    data-id="{{ $epi->id }}" title="Edit" id="openEdit">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <form
                                                    action="{{ route('admin.each-plot-information.destroy', $epi->id) }}"
                                                    method="POST" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-link btn-danger delete-btn"
                                                        data-url="{{ route('admin.each-plot-information.destroy', $epi->id) }}"
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
        // Initialize DataTable with scrollX and fixed footer
        $('#add-row').DataTable({
            scrollX: true,  // Enables horizontal scrolling
            autoWidth: true,  // Prevents auto-adjusting column widths
            fixedHeader: false, // Keeps the header fixed while scrolling
        });

        // Ensure the parent container is styled properly


        // Open the create page for 
        $('#openCreate').click(function () {
            window.location.href = '{{ route('admin.each-plot-information.create') }}';
        });

        // Handle editing a 
        $(document).on('click', '.edit-button', function () {
            var id = $(this).data('id'); // Get the team member ID from the data-id attribute
            var editUrl = '{{ route('admin.each-plot-information.edit', ':id') }}'.replace(':id', id); // Replace :id with the actual ID
            window.location.href = editUrl; // Redirect to the edit page
        });

        // Handle showing team member details in modal
        $(document).on('click', '.show-button', function () {
            var id = $(this).data('id'); // Get the team member ID from the data-id attribute
            var showUrl = '{{ route('admin.each-plot-information.show', ':id') }}'.replace(':id', id); // Replace :id with the actual ID
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
                            "Information has been deleted.",
                            "success"
                        );
                        form.submit(); // Submit the form if confirmed
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            "Cancelled",
                            "Your Information is safe!",
                            "error"
                        );
                    }
                });
            });
        });
    });
</script>

@endsection