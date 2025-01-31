@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')


<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="mb-4">Projects Overview</h3>
            </div>

        </div>


        <div class="accordion" id="projectsAccordion">
            @foreach($projectData as $index => $data)
                <div class="card shadow mb-3">
                    <div class="card-header bg-primary text-white" id="heading{{ $index }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-white" type="button" data-toggle="collapse"
                                data-target="#collapse{{ $index }}" aria-expanded="true"
                                aria-controls="collapse{{ $index }}">
                                {{ $data['project']->project_name }} (LP No: {{ $data['project']->lp_no }})
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}"
                        aria-labelledby="heading{{ $index }}" data-parent="#projectsAccordion">
                        <div class="card-body">
                            <div class="row">
                                <!-- Project Details -->
                                <div class="col-md-6">
                                    <p><strong>RERA No:</strong> {{ $data['project']->rera_no }}</p>
                                    <p><strong>Location:</strong> {{ $data['project']->location }}</p>
                                    <p><strong>Survey No:</strong> {{ $data['project']->survey_no }}</p>
                                    <p><strong>Extent:</strong> {{ $data['project']->extent }} Acres</p>
                                </div>

                                <!-- Plot Level Summary -->
                                <div class="col-md-6">
                                    <p><strong>Total Plots:</strong> {{ $data['plotInfo']->total_plots ?? '0' }}</p>
                                    <p><strong>Available Plots:</strong> {{ $data['plotInfo']->available_plots ?? '0' }}</p>
                                    <p><strong>Booked Plots:</strong> {{ $data['plotInfo']->booked_plots ?? '0' }}</p>
                                    <p><strong>Registered Plots:</strong> {{ $data['plotInfo']->registered_plots ?? '0' }}
                                    </p>
                                    <p><strong>Mortgaged Plots:</strong> {{ $data['mortgagedPlots'] ?? '0' }}</p>
                                </div>
                            </div>

                            <!-- Customer and Accounts Info -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="alert alert-info">
                                        <p><strong>Total Customers:</strong> {{ $data['totalCustomers'] }}</p>
                                        <p><strong>Registered Plots:</strong> {{ $data['registeredPlots'] }}</p>
                                        <p><strong>Booked Plots:</strong> {{ $data['bookedPlots'] }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="alert alert-warning">
                                        <p><strong>Total Company Accounts:</strong> {{ $data['totalcompanyAccounts'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Plot Details Table -->
                            <h6 class="mt-3">Plot Details</h6>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Plot No</th>
                                            <th>Ownership</th>
                                            <th>Name</th>
                                            <th>Coordinates (N, E)</th>
                                            <th>Area (sq yds)</th>
                                            <th>Facing</th>
                                            <th>Availability</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['plots'] as $plot)
                                            <tr>
                                                <td>{{ $plot->plot_no }}</td>
                                                <td>{{ $plot->ownership }}</td>
                                                <td>{{ $plot->name }}</td>
                                                <td>{{ $plot->geo_coordinates_n }}, {{ $plot->geo_coordinates_e }}</td>
                                                <td>{{ $plot->plot_area_sq_yds }}</td>
                                                <td>{{ $plot->facing }}</td>
                                                <td>
                                                    @if($plot->plot_availability_for_sale === 'yes')
                                                        <span class="badge badge-success">Available</span>
                                                    @elseif($plot->plot_availability_for_sale === 'no')
                                                        <span class="badge badge-danger">Sold</span>
                                                    @elseif($plot->plot_availability_for_sale === 'mortgaged')
                                                        <span class="badge badge-warning">Mortgaged</span>
                                                    @else
                                                        <span class="badge badge-secondary">Unknown</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($data['plots']->isEmpty())
                                    <p class="text-center text-muted">No plots available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".btn-link").forEach(button => {
            button.addEventListener("click", function () {
                let target = document.querySelector(this.getAttribute("data-target"));

                if (target.classList.contains("show")) {
                    // If the section is already open, close it
                    target.classList.remove("show");
                } else {
                    // Otherwise, open it (Bootstrap default behavior)
                    document.querySelectorAll(".collapse").forEach(collapse => {
                        collapse.classList.remove("show");
                    });
                    target.classList.add("show");
                }
            });
        });
    });
</script>
@endsection