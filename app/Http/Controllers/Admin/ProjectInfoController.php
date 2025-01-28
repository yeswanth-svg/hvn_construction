<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectInformation;

class ProjectInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = ProjectInformation::all();
        return view('admin.project_info.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.project_info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'project_name' => 'required',
                'lp_no' => 'required',
                'rera_no' => 'required',
                'location' => 'required',
                'survey_no' => 'required',
                'extent' => 'required',
            ]
        );

        $pro = new ProjectInformation();
        $pro->project_name = $request->project_name;
        $pro->lp_no = $request->lp_no;
        $pro->rera_no = $request->rera_no;
        $pro->location = $request->location;
        $pro->survey_no = $request->survey_no;
        $pro->extent = $request->extent;
        $pro->save();
        return redirect()->route('admin.project-info.index')->with('success', 'Project Information added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $project = ProjectInformation::find($id);
        return view('admin.project_info.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $project = ProjectInformation::find($id);
        return view('admin.project_info.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'project_name' => 'required',
                'lp_no' => 'required',
                'rera_no' => 'required',
                'location' => 'required',
                'survey_no' => 'required',
                'extent' => 'required',
            ]
        );

        $pro = ProjectInformation::find($id);
        $pro->project_name = $request->project_name;
        $pro->lp_no = $request->lp_no;
        $pro->rera_no = $request->rera_no;
        $pro->location = $request->location;
        $pro->survey_no = $request->survey_no;
        $pro->extent = $request->extent;
        $pro->save();
        return redirect()->route('admin.project-info.index')->with('success', 'Project Information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pro = ProjectInformation::find($id);
        $pro->delete();
        return redirect()->route('admin.project-info.index')->with('success', 'Project Information deleted successfully');
    }
}
