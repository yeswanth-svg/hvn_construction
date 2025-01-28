<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EPI;
use App\Models\ProjectInformation;
use Illuminate\Http\Request;

class EPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $epis = EPI::all();
        return view('admin.epi.index', compact('epis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $projects = ProjectInformation::all();
        return view('admin.epi.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'project_id' => 'required|exists:project_information,id',
            'plot_no' => 'required|string|max:255',
            'ownership' => 'required|in:Land Owner,Developer',
            'name' => 'required|string|max:255',
            'geo_coordinates_n' => 'required|string|max:255',
            'geo_coordinates_e' => 'required|string|max:255',
            'plot_area_sq_yds' => 'required|numeric',
            'plot_area_cents' => 'required|numeric',
            'facing' => 'required|string|max:255',
            'size_east' => 'required|numeric',
            'size_west' => 'required|numeric',
            'size_north' => 'required|numeric',
            'size_south' => 'required|numeric',
            'plot_availability_for_sale' => 'required|in:yes,no,mortgaged',
        ]);


        EPI::create($request->all());

        // Save the plot record to the database

        // Redirect or return response
        return redirect()->route('admin.each-plot-information.index')->with('success', 'Plot Data successfully added!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $epi = EPI::findOrFail($id);
        return view('admin.epi.show', compact('epi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $epi = EPI::findOrFail($id);
        $projects = ProjectInformation::all();
        return view('admin.epi.edit', compact('epi', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'project_id' => 'required|exists:project_information,id',
            'plot_no' => 'required|string|max:255',
            'ownership' => 'required|in:Land Owner,Developer',
            'name' => 'required|string|max:255',
            'geo_coordinates_n' => 'required|string|max:255',
            'geo_coordinates_e' => 'required|string|max:255',
            'plot_area_sq_yds' => 'required|numeric',
            'plot_area_cents' => 'required|numeric',
            'facing' => 'required|string|max:255',
            'size_east' => 'required|numeric',
            'size_west' => 'required|numeric',
            'size_north' => 'required|numeric',
            'size_south' => 'required|numeric',
            'plot_availability_for_sale' => 'required|in:yes,no,mortgaged',
        ]);

        // Find the plot by ID
        $epi = EPI::findOrFail($id);

        // Update the plot record with the validated data
        $epi->update($request->all());

        // Redirect with a success message
        return redirect()->route('admin.each-plot-information.index')->with('success', 'Plot data updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $epi = EPI::findOrFail($id);
        $epi->delete();
        return redirect()->route('admin.each-plot-information.index')->with('success', 'Plot Data successfully deleted!');
    }
}
