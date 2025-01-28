@extends('layouts.admin')
@section('title', 'Edit Customer Details')
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
                    <a>Edit Customer Details</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Customer Details</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.customer-details.update', $customer->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="project_id" class="form-label fs-5 fw-bold text-secondary">Project
                                    Name</label>
                                <select class="form-select" name="project_id" id="project_id" required>
                                    <option value="" disabled>Select Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" {{ $customer->project_id == $project->id ? 'selected' : '' }}>
                                            {{ $project->project_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="plot_no" class="form-label fs-5 fw-bold text-secondary">Plot NO
                                </label>
                                <select class="form-select" name="plot_no" id="plot_no" required>
                                    <option value="" disabled>Select Plot no</option>
                                    @foreach ($plots as $plot)
                                        <option value="{{ $plot->plot_no }}" {{ $customer->plot_no == $plot->plot_no ? 'selected' : '' }}>
                                            {{ $plot->plot_no }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="customer_name" class="form-label fs-5 fw-bold text-secondary">Customer
                                    Name</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" required
                                    value="{{old($customer->customer_name, 'customer_name')}}"
                                    placeholder="Enter Customer Name">
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label fs-5 fw-bold text-secondary">Phone Number
                                </label>
                                <input type="number" name="phone_number" id="phone_number" class="form-control" required
                                    value="{{old('phone_number', $customer->phone_number)}}"
                                    placeholder="Enter Phone Number">
                            </div>

                            <div class=" mb-3">
                                <label for="pan_no" class="form-label fs-5 fw-bold text-secondary">PAN NO
                                </label>
                                <input type="string" name="pan_no" id="pan_no" class="form-control" required
                                    value="{{old('pan_no', $customer->pan_no)}}" placeholder="Enter PAN NO">
                            </div>


                            <div class="mb-3">
                                <label for="aadhaar_no" class="form-label fs-5 fw-bold text-secondary">AADHAR NO
                                </label>
                                <input type="number" name="aadhaar_no" id="aadhaar_no" class="form-control"
                                    value="{{old('aadhaar_no', $customer->aadhaar_no)}}" placeholder="Enter AADHAR No">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label fs-5 fw-bold text-secondary">Address
                                </label>
                                <input type="string" name="address" id="address" class="form-control" required
                                    value="{{old('address', $customer->address)}}" placeholder="Enter Address">
                            </div>

                            <div class="mb-3">
                                <label for="market_value_per_sqyd" class="form-label fs-5 fw-bold text-secondary">Market
                                    Value
                                </label>
                                <input type="number" name="market_value_per_sqyd" id="market_value_per_sqyd"
                                    class="form-control" required
                                    value="{{old('market_value_per_sqyd', $customer->market_value_per_sqyd)}}"
                                    placeholder="Enter Market Value" step="0.1">
                            </div>

                            <div class="mb-3">
                                <label for="price_per_sqyd" class="form-label fs-5 fw-bold text-secondary">Price/Sqyd
                                </label>
                                <input type="number" name="price_per_sqyd" id="price_per_sqyd" class="form-control"
                                    value="{{old('price_per_sqyd', $customer->price_per_sqyd)}}"
                                    placeholder="Enter Price per Sqyd" step="0.1">
                            </div>

                            <div class="mb-3">
                                <label for="price_per_cent" class="form-label fs-5 fw-bold text-secondary">Price/Cent
                                </label>
                                <input type="number" name="price_per_cent" id="price_per_cent" class="form-control"
                                    value="{{old('price_per_cent', $customer->price_per_cent)}}"
                                    placeholder="Price per Cent" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="total_plot_value" class="form-label fs-5 fw-bold text-secondary">Total Plot
                                    Value
                                </label>
                                <input type="number" name="total_plot_value" id="total_plot_value" class="form-control"
                                    value="{{old('total_plot_value', $customer->total_plot_value)}}"
                                    placeholder="Total Plot Value" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="total_market_value" class="form-label fs-5 fw-bold text-secondary">Total
                                    Market Value
                                </label>
                                <input type="number" name="total_market_value" id="total_market_value"
                                    class="form-control"
                                    value="{{old('total_market_value', $customer->total_market_value)}}"
                                    placeholder="Total Market Value" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label fs-5 fw-bold text-secondary">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    @if($customer->status == 'Booked')
                                        <option value="Booked" selected>Booked</option>
                                        <option value="Registered">Registered</option>
                                    @elseif($customer->status == 'Registered')
                                        <option value="Registered" selected>Registered</option>
                                        <option value="Booked">Booked</option>
                                    @else
                                        <option value="Booked">Booked</option>
                                        <option value="Registered">Registered</option>
                                    @endif
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.customer-details.index') }}"
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
        const plotSelect = document.getElementById('plot_no');
        const marketValueInput = document.getElementById('market_value_per_sqyd');
        const pricePerSqYdInput = document.getElementById('price_per_sqyd');
        const pricePerCentInput = document.getElementById('price_per_cent');
        const totalMarketValueInput = document.getElementById('total_market_value');
        const totalPlotValueInput = document.getElementById('total_plot_value');

        let plotArea = 0;

        // Fetch plot area when the page is loaded if a plot is already selected
        const initialPlotNo = plotSelect.value;
        if (initialPlotNo) {
            const initialUrl = `{{ route('admin.plot.getArea', ':plot_no') }}`.replace(':plot_no', initialPlotNo);
            fetchPlotArea(initialUrl);
        }

        // Fetch plot area when the plot is changed
        plotSelect.addEventListener('change', function () {
            const plotNo = this.value;

            if (plotNo) {
                const url = `{{ route('admin.plot.getArea', ':plot_no') }}`.replace(':plot_no', plotNo);
                fetchPlotArea(url);
            }
        });

        // Fetch plot area from the server
        function fetchPlotArea(url) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.plot_area_sq_yds) {
                        plotArea = data.plot_area_sq_yds;
                        console.log('Plot area:', plotArea);
                        calculateValues(); // Recalculate the values with the fetched plot area
                    }
                })
                .catch(error => console.error('Error fetching plot area:', error));
        }

        // Calculate and update the fields dynamically
        function calculateValues() {
            const marketValue = parseFloat(marketValueInput.value) || 0;
            const pricePerSqYd = parseFloat(pricePerSqYdInput.value) || 0;

            // Update price per cent (48 sqyd in a cent)
            pricePerCentInput.value = (pricePerSqYd * 48).toFixed(2);

            // Update total market value (market_value_per_sqyd * plot_area_sq_yds)
            totalMarketValueInput.value = (marketValue * plotArea).toFixed(2);

            // Update total plot value (price_per_sqyd * plot_area_sq_yds)
            totalPlotValueInput.value = (pricePerSqYd * plotArea).toFixed(2);
        }

        // Recalculate values on input change
        marketValueInput.addEventListener('input', calculateValues);
        pricePerSqYdInput.addEventListener('input', calculateValues);
    });

</script>



@endsection