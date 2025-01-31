@extends('layouts.admin')
@section('title', 'Create Plot Level Information')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Plot Level Information</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.plot-level-information.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.plot-level-information.index') }}">Plot Level Information</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Add Plot Level Information</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Plot Level Information</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.plot-level-information.store') }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf

                            <div class="row">
                                <!-- First Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="project_id" class="form-label fs-5 fw-bold text-secondary">Project
                                            Name</label>
                                        <select name="project_id" id="project_id" class="form-select" required>
                                            <option value="">Select Project</option>
                                            @foreach($projects as $project)
                                                <option value="{{$project->id }}">{{ $project->project_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="total_plots" class="form-label fs-5 fw-bold text-secondary">Total
                                            Plots</label>
                                        <input type="number" name="total_plots" id="total_plots" class="form-control"
                                            required value="{{old('total_plots')}}" placeholder="Enter Total Plots">
                                    </div>

                                    <div class="mb-3">
                                        <label for="mortgaged_plots"
                                            class="form-label fs-5 fw-bold text-secondary">Mortgaged Plots</label>
                                        <input type="number" name="mortgaged_plots" id="mortgaged_plots"
                                            class="form-control" required value="{{old('mortgaged_plots')}}"
                                            placeholder="Enter Mortgaged Plots">
                                    </div>

                                    <div class="mb-3">
                                        <label for="developer_plots"
                                            class="form-label fs-5 fw-bold text-secondary">Developer Plots</label>
                                        <input type="number" name="developer_plots" id="developer_plots"
                                            class="form-control" required value="{{old('developer_plots')}}"
                                            placeholder="Enter Developer Plots">
                                    </div>
                                </div>

                                <!-- Second Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="land_owner_plots"
                                            class="form-label fs-5 fw-bold text-secondary">Land Owner Plots</label>
                                        <input type="number" name="land_owner_plots" id="land_owner_plots"
                                            class="form-control" readonly value="{{old('land_owner_plots')}}"
                                            placeholder="Land Owner Plots">
                                    </div>

                                    <div class="mb-3">
                                        <label for="registered_plots"
                                            class="form-label fs-5 fw-bold text-secondary">Registered Plots</label>
                                        <input type="number" name="registered_plots" id="registered_plots"
                                            class="form-control" required value="{{old('registered_plots')}}"
                                            placeholder="Enter Registered Plots">
                                    </div>

                                    <div class="mb-3">
                                        <label for="booked_plots" class="form-label fs-5 fw-bold text-secondary">Booked
                                            Plots</label>
                                        <input type="number" name="booked_plots" id="booked_plots" class="form-control"
                                            required value="{{old('booked_plots')}}" placeholder="Enter Booked Plots">
                                    </div>

                                    <div class="mb-3">
                                        <label for="available_plots"
                                            class="form-label fs-5 fw-bold text-secondary">Available Plots</label>
                                        <input type="number" name="available_plots" id="available_plots"
                                            class="form-control" readonly value="{{old('available_plots')}}"
                                            placeholder="Available Plots">
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const totalPlotsInput = document.getElementById('total_plots');
        const developerPlotsInput = document.getElementById('developer_plots');
        const landOwnerPlotsInput = document.getElementById('land_owner_plots');
        const registeredPlotsInput = document.getElementById('registered_plots');
        const availablePlotsInput = document.getElementById('available_plots');

        function calculatePlots() {
            const totalPlots = parseFloat(totalPlotsInput.value) || 0;
            const developerPlots = parseFloat(developerPlotsInput.value) || 0;
            const registeredPlots = parseFloat(registeredPlotsInput.value) || 0;

            // Calculate land owner plots
            const landOwnerPlots = totalPlots - developerPlots;
            landOwnerPlotsInput.value = landOwnerPlots >= 0 ? landOwnerPlots : 0;

            // Calculate available plots
            const availablePlots = developerPlots - registeredPlots;
            availablePlotsInput.value = availablePlots >= 0 ? availablePlots : 0;
        }

        // Attach event listeners to recalculate when inputs change
        totalPlotsInput.addEventListener('input', calculatePlots);
        developerPlotsInput.addEventListener('input', calculatePlots);
        registeredPlotsInput.addEventListener('input', calculatePlots);
    });
</script>




@endsection