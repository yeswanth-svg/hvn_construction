@extends('layouts.admin')
@section('title', 'Add Customer Details')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Customer Details</h3>
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
                    <a href="{{ route('admin.customer-details.index') }}">Customer Details</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Add Customer Details</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Customer</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.customer-details.store') }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            <div class="mb-3">
                                <label for="project_name" class="form-label fs-5 fw-bold text-secondary">Project
                                    Name</label>
                                <select name="project_id" id="project_id" class="form-select" required>
                                    <option value="">Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id }}">{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="project_name" class="form-label fs-5 fw-bold text-secondary">Plot No
                                </label>
                                <select name="plot_no" id="plot_no" class="form-select" required>
                                    <option value="">Select Plot No</option>
                                    @foreach($plots as $plot)
                                        <option value="{{$plot->plot_no }}">{{ $plot->plot_no }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="customer_name" class="form-label fs-5 fw-bold text-secondary">Customer
                                    Name</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" required
                                    value="{{old('customer_name')}}" placeholder="Enter Customer Name">
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label fs-5 fw-bold text-secondary">Phone Number
                                </label>
                                <input type="number" name="phone_number" id="phone_number" class="form-control" required
                                    value="{{old('phone_number')}}" placeholder="Enter Phone Number">
                            </div>

                            <div class=" mb-3">
                                <label for="pan_no" class="form-label fs-5 fw-bold text-secondary">PAN NO
                                </label>
                                <input type="string" name="pan_no" id="pan_no" class="form-control" required
                                    value="{{old('pan_no')}}" placeholder="Enter PAN NO">
                            </div>


                            <div class="mb-3">
                                <label for="aadhaar_no" class="form-label fs-5 fw-bold text-secondary">AADHAR NO
                                </label>
                                <input type="number" name="aadhaar_no" id="aadhaar_no" class="form-control"
                                    value="{{old('aadhaar_no')}}" placeholder="Enter AADHAR No">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label fs-5 fw-bold text-secondary">Address
                                </label>
                                <input type="string" name="address" id="address" class="form-control" required
                                    value="{{old('address')}}" placeholder="Enter Address">
                            </div>

                            <div class="mb-3">
                                <label for="market_value_per_sqyd" class="form-label fs-5 fw-bold text-secondary">Market
                                    Value
                                </label>
                                <input type="number" name="market_value_per_sqyd" id="market_value_per_sqyd"
                                    class="form-control" required value="{{old('market_value_per_sqyd')}}"
                                    placeholder="Enter Market Value" step="0.1">
                            </div>

                            <div class="mb-3">
                                <label for="price_per_sqyd" class="form-label fs-5 fw-bold text-secondary">Price/Sqyd
                                </label>
                                <input type="number" name="price_per_sqyd" id="price_per_sqyd" class="form-control"
                                    value="{{old('price_per_sqyd')}}" placeholder="Enter Price per Sqyd" step="0.1">
                            </div>

                            <div class="mb-3">
                                <label for="price_per_cent" class="form-label fs-5 fw-bold text-secondary">Price/Cent
                                </label>
                                <input type="number" name="price_per_cent" id="price_per_cent" class="form-control"
                                    value="{{old('price_per_cent')}}" placeholder="Price per Cent" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="total_plot_value" class="form-label fs-5 fw-bold text-secondary">Total Plot
                                    Value
                                </label>
                                <input type="number" name="total_plot_value" id="total_plot_value" class="form-control"
                                    value="{{old('total_plot_value')}}" placeholder="Total Plot Value" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="total_market_value" class="form-label fs-5 fw-bold text-secondary">Total
                                    Market Value
                                </label>
                                <input type="number" name="total_market_value" id="total_market_value"
                                    class="form-control" value="{{old('total_market_value')}}"
                                    placeholder="Total Market Value" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label fs-5 fw-bold text-secondary">Status
                                </label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="Booked">Booked</option>
                                    <option value="Registered">Registered</option>
                                </select>
                            </div>
                            <!-- Submit Button -->
                            <div class="mt-4">
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
        const plotSelect = document.getElementById('plot_no');
        const marketValueInput = document.getElementById('market_value_per_sqyd');
        const pricePerSqYdInput = document.getElementById('price_per_sqyd');
        const pricePerCentInput = document.getElementById('price_per_cent');
        const totalMarketValueInput = document.getElementById('total_market_value');

        let plotArea = 0;

        // Fetch plot area when plot is selected
        const fetchPlotAreaUrl = @json(route('admin.plot.getArea', ['plot_no' => ':plot_no']));

        plotSelect.addEventListener('change', function () {
            const plotNo = this.value;

            if (plotNo) {
                const url = fetchPlotAreaUrl.replace(':plot_no', plotNo);
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data.plot_area_sq_yds) {
                            plotArea = data.plot_area_sq_yds;
                            console.log(plotArea);
                            calculateValues();
                        }
                    })
                    .catch(error => console.error('Error fetching plot area:', error));
            }
        });


        // Calculate and update the fields dynamically
        function calculateValues() {
            const marketValue = parseFloat(marketValueInput.value) || 0;
            const pricePerSqYd = parseFloat(pricePerSqYdInput.value) || 0;

            // Update price per cent
            pricePerCentInput.value = (pricePerSqYd * 48).toFixed(2);

            // Update total market value
            totalMarketValueInput.value = (marketValue * plotArea).toFixed(2);

            // Update total plot value
            const totalPlotValue = document.getElementById('total_plot_value');
            if (totalPlotValue) {
                totalPlotValue.value = (pricePerSqYd * plotArea).toFixed(2);
            }
        }

        // Recalculate values on input change
        marketValueInput.addEventListener('input', calculateValues);
        pricePerSqYdInput.addEventListener('input', calculateValues);
    });
</script>



@endsection