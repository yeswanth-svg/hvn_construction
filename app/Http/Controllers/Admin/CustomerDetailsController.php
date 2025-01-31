<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerDetail;
use App\Models\EPI;
use App\Models\PaymentDetail;
use App\Models\ProjectInformation;
use Illuminate\Http\Request;

class CustomerDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = CustomerDetail::all();
        return view('admin.customer_details.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get plot numbers that are already booked or registered
        $reservedPlots = CustomerDetail::whereIn('status', ['booked', 'registered'])->pluck('plot_no');

        // Get all plots except the reserved ones
        $plots = EPI::whereNotIn('plot_no', $reservedPlots)->get();

        // Fetch projects
        $projects = ProjectInformation::all();

        return view('admin.customer_details.create', compact('projects', 'plots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'project_id' => 'required|exists:project_information,id',
            'plot_no' => 'required|exists:e_p_i,plot_no', // Ensure the plot number exists in the `EPI` table
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'pan_no' => 'required|string|max:10',
            'aadhaar_no' => 'required|string|max:12',
            'address' => 'required|string|max:500',
            'market_value_per_sqyd' => 'required|numeric|min:0',
            'price_per_sqyd' => 'required|numeric|min:0',
            'price_per_cent' => 'required|numeric|min:0', // Calculated field
            'total_plot_value' => 'required|numeric|min:0', // Calculated field
            'total_market_value' => 'required|numeric|min:0', // Calculated field
            'status' => 'required|in:Booked,Registered',
        ]);

        // Store the validated data
        $customerDetail = CustomerDetail::create($validated);

        // If the status is "Booked" or "Registered", update the EPI table
        if (in_array($validated['status'], ['Booked', 'Registered'])) {
            EPI::where('plot_no', $validated['plot_no'])->update(['plot_availability_for_sale' => 'no']);
        }

        // Redirect to the index route with a success message
        return redirect()->route('admin.customer-details.index')
            ->with('success', 'Customer details added successfully.');
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        $customer = CustomerDetail::with('project') // Assuming a relation with `Project`
            ->findOrFail($id);
        $projectId = $customer->project_id;

        // Get all payments for the customer in the specific project
        $receivedAmount = PaymentDetail::where('customer_id', $customer->id)
            ->where('project_id', $projectId)
            ->sum('amount');

        $balance = $customer->total_plot_value - $receivedAmount;

        return view('admin.customer_details.show', compact('customer', 'receivedAmount', 'balance'));
    }


    public function edit(string $id)
    {
        //
        $customer = CustomerDetail::find($id);
        $projects = ProjectInformation::all();
        $plots = EPI::all();
        return view('admin.customer_details.edit', compact('customer', 'projects', 'plots'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'project_id' => 'required|exists:project_information,id',
            'plot_no' => 'required|exists:e_p_i,plot_no',
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'pan_no' => 'required|string|max:10',
            'aadhaar_no' => 'required|string|max:12',
            'address' => 'required|string|max:500',
            'market_value_per_sqyd' => 'required|numeric|min:0',
            'price_per_sqyd' => 'required|numeric|min:0',
            'price_per_cent' => 'required|numeric|min:0',
            'total_plot_value' => 'required|numeric|min:0',
            'total_market_value' => 'required|numeric|min:0',
            'status' => 'required|in:Booked,Registered',
        ]);


        // Update the customer details
        CustomerDetail::where('id', $id)->update($validated);
        // If the status is "Booked" or "Registered", update the EPI table
        if (in_array($validated['status'], ['Booked', 'Registered'])) {
            EPI::where('plot_no', $validated['plot_no'])->update(['plot_availability_for_sale' => 'no']);
        }

        // Redirect to the index route with a success message
        return redirect()->route('admin.customer-details.index')
            ->with('success', 'Customer details Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer = CustomerDetail::find($id);

        $customer->delete();
        return redirect()->route('admin.customer-details.index')
            ->with('success', 'Customer details deleted successfully.');


    }

    // PlotController.php
    public function getPlotArea($plot_no)
    {
        $plot = EPI::where('plot_no', $plot_no)->first();
        if ($plot) {
            return response()->json(['plot_area_sq_yds' => $plot->plot_area_sq_yds]);
        }
        return response()->json(['error' => 'Plot not found'], 404);
    }

}
