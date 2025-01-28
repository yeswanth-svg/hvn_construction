@extends('layouts.admin')
@section('title', 'Edit Each Plot Information')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Each Plot Information</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.each-plot-information.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.each-plot-information.index') }}">Each Plot Information</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Edit Plot Information</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Plot Information</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.each-plot-information.update', $epi->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="project_name" class="form-label fs-5 fw-bold text-secondary">Project
                                    Name</label>
                                <select name="project_id" id="project_id" class="form-select" required>
                                    <option value="">Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}" {{ old('project_id', $epi->project_id) == $project->id ? 'selected' : '' }}>
                                            {{ $project->project_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="plot_no" class="form-label fs-5 fw-bold text-secondary">Plot No</label>
                                <input type="text" name="plot_no" id="plot_no" class="form-control" required
                                    value="{{ old('plot_no', $epi->plot_no) }}" placeholder="Enter Plot No">
                            </div>

                            <div class="mb-3">
                                <label for="ownership" class="form-label fs-5 fw-bold text-secondary">Ownership</label>
                                <select name="ownership" id="ownership" class="form-select" required>
                                    <option value="Land Owner" {{ old('ownership', $epi->ownership) == 'Land Owner' ? 'selected' : '' }}>Land Owner</option>
                                    <option value="Developer" {{ old('ownership', $epi->ownership) == 'Developer' ? 'selected' : '' }}>Developer</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fs-5 fw-bold text-secondary">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    value="{{ old('name', $epi->name) }}" placeholder="Enter Name">
                            </div>

                            <div class="mb-3">
                                <label for="geo_coordinates_n" class="form-label fs-5 fw-bold text-secondary">Geo
                                    Coordinates
                                    N</label>
                                <input type="text" name="geo_coordinates_n" id="geo_coordinates_n" class="form-control"
                                    required value="{{ old('geo_coordinates_n', $epi->geo_coordinates_n) }}"
                                    placeholder="Enter Geo Coordinates N">
                            </div>

                            <div class="mb-3">
                                <label for="geo_coordinates_e" class="form-label fs-5 fw-bold text-secondary">Geo
                                    Coordinates
                                    E</label>
                                <input type="text" name="geo_coordinates_e" id="geo_coordinates_e" class="form-control"
                                    required value="{{ old('geo_coordinates_e', $epi->geo_coordinates_e) }}"
                                    placeholder="Enter Geo Coordinates E">
                            </div>

                            <div class="mb-3">
                                <label for="plot_area_sq_yds" class="form-label fs-5 fw-bold text-secondary">Plot Area
                                    (sq.
                                    yds)</label>
                                <input type="number" name="plot_area_sq_yds" id="plot_area_sq_yds" class="form-control"
                                    required value="{{ old('plot_area_sq_yds', $epi->plot_area_sq_yds) }}"
                                    placeholder="Enter Plot Area in Sq. Yds">
                            </div>

                            <div class="mb-3">
                                <label for="plot_area_cents" class="form-label fs-5 fw-bold text-secondary">Plot Area
                                    (cents)</label>
                                <input type="number" name="plot_area_cents" id="plot_area_cents" class="form-control"
                                    required value="{{ old('plot_area_cents', $epi->plot_area_cents) }}"
                                    placeholder="Enter Plot Area in Cents" step="0.1">
                            </div>

                            <div class="mb-3">
                                <label for="facing" class="form-label fs-5 fw-bold text-secondary">Facing</label>
                                <input type="text" name="facing" id="facing" class="form-control" required
                                    value="{{ old('facing', $epi->facing) }}" placeholder="Enter Facing">
                            </div>

                            <div class="mb-3">
                                <label for="size_east" class="form-label fs-5 fw-bold text-secondary">Size
                                    (East)</label>
                                <input type="number" name="size_east" id="size_east" class="form-control" required
                                    value="{{ old('size_east', $epi->size_east) }}" placeholder="Enter Size East">
                            </div>

                            <div class="mb-3">
                                <label for="size_west" class="form-label fs-5 fw-bold text-secondary">Size
                                    (West)</label>
                                <input type="number" name="size_west" id="size_west" class="form-control" required
                                    value="{{ old('size_west', $epi->size_west) }}" placeholder="Enter Size West">
                            </div>

                            <div class="mb-3">
                                <label for="size_north" class="form-label fs-5 fw-bold text-secondary">Size
                                    (North)</label>
                                <input type="number" name="size_north" id="size_north" class="form-control" required
                                    value="{{ old('size_north', $epi->size_north) }}" placeholder="Enter Size North">
                            </div>

                            <div class="mb-3">
                                <label for="size_south" class="form-label fs-5 fw-bold text-secondary">Size
                                    (South)</label>
                                <input type="number" name="size_south" id="size_south" class="form-control" required
                                    value="{{ old('size_south', $epi->size_south) }}" placeholder="Enter Size South">
                            </div>

                            <div class="mb-3">
                                <label for="plot_availability_for_sale"
                                    class="form-label fs-5 fw-bold text-secondary">Plot
                                    Availability for Sale</label>
                                <select name="plot_availability_for_sale" id="plot_availability_for_sale"
                                    class="form-select" required>
                                    <option value="yes" {{ old('plot_availability_for_sale', $epi->plot_availability_for_sale) == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ old('plot_availability_for_sale', $epi->plot_availability_for_sale) == 'no' ? 'selected' : '' }}>No</option>
                                    <option value="mortgaged" {{ old('plot_availability_for_sale', $epi->plot_availability_for_sale) == 'mortgaged' ? 'selected' : '' }}>Mortgaged
                                    </option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.each-plot-information.index') }}"
                                    class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection