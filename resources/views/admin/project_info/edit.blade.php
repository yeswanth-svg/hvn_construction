@extends('layouts.admin')
@section('title', 'Edit Project Information')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Project Information</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.project-info.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.project-info.index') }}">Project Information</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Edit Information</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Information</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.project-info.update', $project->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="project_name" class="form-label fs-5 fw-bold text-secondary">Project
                                    Name</label>
                                <input type="text" name="project_name" id="project_name" class="form-control" required
                                    value="{{$project->project_name}}" placeholder="Enter Project Name">
                            </div>

                            <div class="mb-3">
                                <label for="lp_no" class="form-label fs-5 fw-bold text-secondary">LP Number</label>
                                <input type="text" name="lp_no" id="lp_no" class="form-control" required
                                    value="{{$project->lp_no}}" placeholder="Enter LP Number">
                            </div>

                            <div class="mb-3">
                                <label for="rera_no" class="form-label fs-5 fw-bold text-secondary">RERA Number</label>
                                <input type="text" name="rera_no" id="rera_no" class="form-control" required
                                    value="{{$project->rera_no}}" placeholder="Enter RERA Number">
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label fs-5 fw-bold text-secondary">Location</label>
                                <input type="text" name="location" id="location" class="form-control" required
                                    value="{{$project->location}}" placeholder="Enter Location">
                            </div>

                            <div class="mb-3">
                                <label for="survey_no" class="form-label fs-5 fw-bold text-secondary">Survey No</label>
                                <input type="number" name="survey_no" id="survey_no" class="form-control" required
                                    value="{{$project->survey_no}}" placeholder="Enter Survey No">
                            </div>

                            <div class="mb-3">
                                <label for="extent" class="form-label fs-5 fw-bold text-secondary">Extent
                                    (Acres)</label>
                                <input type="text" name="extent" id="extent" class="form-control" required
                                    value="{{$project->extent }}" placeholder="Enter Extent(Acres)">
                            </div>


                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.project-info.index') }}" class="btn btn-secondary">Cancel</a>
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