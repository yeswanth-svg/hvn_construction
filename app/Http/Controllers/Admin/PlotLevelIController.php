<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlotLevelI;
use App\Models\ProjectInformation;
use Illuminate\Http\Request;

class PlotLevelIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plots = PlotLevelI::all();
        return view('admin.plot_level_i.index', compact('plots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $projects = ProjectInformation::all();
        return view('admin.plot_level_i.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'project_id' => 'required',
            'total_plots' => 'required',
            'mortgaged_plots' => 'required',
            'developer_plots' => 'required',
            'land_owner_plots' => 'required',
            'registered_plots' => 'required',
            'booked_plots' => 'required',
            'available_plots' => 'required',
        ]);

        PlotLevelI::create($request->all());
        return redirect()->route('admin.plot-level-information.index')->with('success', 'Plot Level Information created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $plot = PlotLevelI::with('project')->findOrFail($id); // Include the project relation
        return view('admin.plot_level_i.show', compact('plot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plot = PlotLevelI::with('project')->findOrFail($id); // Include the project relation
        $projects = ProjectInformation::all(); // Fetch all projects for the dropdown
        return view('admin.plot_level_i.edit', compact('plot', 'projects'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'project_id' => 'required',
            'total_plots' => 'required',
            'mortgaged_plots' => 'required',
            'developer_plots' => 'required',
            'land_owner_plots' => 'required',
            'registered_plots' => 'required',
            'booked_plots' => 'required',
            'available_plots' => 'required',
        ]);

        $plot = PlotLevelI::findOrFail($id);
        $plot->update($request->all());
        return redirect()->route('admin.plot-level-information.index')->with('success', 'Plot Level Information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $plot = PlotLevelI::findOrFail($id);
        $plot->delete();
        return redirect()->route('admin.plot-level-information.index')->with('success', 'Plot Level Information deleted successfully');
    }
}
