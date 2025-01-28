@extends('layouts.admin')
@section('title', 'Edit Plot Level Information')
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
                    <a>Edit Plot Level Information</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Plot Level Information</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.plot-level-information.update', $plot->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="project_id" class="form-label fs-5 fw-bold text-secondary">Project
                                    Name</label>
                                <select class="form-select" name="project_id" id="project_id" required>
                                    <option value="" disabled>Select Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" {{ $plot->project_id == $project->id ? 'selected' : '' }}>
                                            {{ $project->project_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="total_plots" class="form-label fs-5 fw-bold text-secondary">Total
                                    Plots</label>
                                <input type="number" name="total_plots" id="total_plots" class="form-control" required
                                    value="{{$plot->total_plots}}" placeholder="Enter Project Name">
                            </div>

                            <div class="mb-3">
                                <label for="mortgaged_plots" class="form-label fs-5 fw-bold text-secondary">Mortgaged
                                    Plots</label>
                                <input type="number" name="mortgaged_plots" id="mortgaged_plots" class="form-control"
                                    required value="{{$plot->mortgaged_plots}}" placeholder="Enter Mortgaged Plots">
                            </div>

                            <div class=" mb-3">
                                <label for="developer_plots" class="form-label fs-5 fw-bold text-secondary">Developer
                                    Plots</label>
                                <input type="number" name="developer_plots" id="developer_plots" class="form-control"
                                    required value="{{$plot->developer_plots}}" placeholder="Enter Developer Plots">
                            </div>


                            <div class="mb-3">
                                <label for="land_owner_plots" class="form-label fs-5 fw-bold text-secondary">Land Owner
                                    Plots</label>
                                <input type="number" name="land_owner_plots" id="land_owner_plots" class="form-control"
                                    readonly value="{{ $plot->land_owner_plots}}" placeholder="Land Owner Plots">
                            </div>

                            <div class="mb-3">
                                <label for="registered_plots" class="form-label fs-5 fw-bold text-secondary">Registered
                                    Plots</label>
                                <input type="number" name="registered_plots" id="registered_plots" class="form-control"
                                    required value="{{ $plot->registered_plots}}" placeholder="Enter Registered Plots">
                            </div>

                            <div class="mb-3">
                                <label for="booked_plots" class="form-label fs-5 fw-bold text-secondary">Booked Plots
                                </label>
                                <input type="number" name="booked_plots" id="booked_plots" class="form-control" required
                                    value="{{$plot->booked_plots}}" placeholder="Enter Booked Plots">
                            </div>

                            <div class="mb-3">
                                <label for="available_plots" class="form-label fs-5 fw-bold text-secondary">Available
                                    Plots
                                </label>
                                <input type="number" name="available_plots" id="available_plots" class="form-control"
                                    value="{{$plot->available_plots}}" placeholder="Available Plots" readonly>
                            </div>
                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.plot-level-information.index') }}"
                                    class="btn btn-secondary">Cancel</a>
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