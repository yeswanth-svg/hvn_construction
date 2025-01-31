<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\CustomerDetail;
use App\Models\EPI;
use App\Models\PlotLevelI;
use App\Models\ProjectInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $projects = ProjectInformation::select('id', 'project_name', 'lp_no', 'rera_no', 'location', 'survey_no', 'extent')->get();

        // Create an array to store project-specific data
        $projectData = [];

        foreach ($projects as $project) {
            $projectId = $project->id;

            $plotInfo = PlotLevelI::where('project_id', $projectId)->select(
                'total_plots',
                'mortgaged_plots',
                'developer_plots',
                'land_owner_plots',
                'registered_plots',
                'booked_plots',
                'available_plots'
            )->first();

            $totalCustomers = CustomerDetail::where('project_id', $projectId)->count();
            $registeredPlots = CustomerDetail::where('project_id', $projectId)->where('status', 'Registered')->count();
            $bookedPlots = CustomerDetail::where('project_id', $projectId)->where('status', 'Booked')->count();
            $mortgagedPlots = PlotLevelI::where('project_id', $projectId)->sum('mortgaged_plots');
            $totalPlots = PlotLevelI::where('project_id', $projectId)->sum('total_plots');

            $plots = EPI::where('project_id', $projectId)->select(
                'plot_no',
                'ownership',
                'name',
                'geo_coordinates_n',
                'geo_coordinates_e',
                'plot_area_sq_yds',
                'plot_area_cents',
                'facing',
                'size_east',
                'size_west',
                'size_north',
                'size_south',
                'plot_availability_for_sale'
            )->get();

            $totalcompanyAccounts = CompanyAccount::count();

            // Store data in an array
            $projectData[] = [
                'project' => $project,
                'plotInfo' => $plotInfo,
                'totalCustomers' => $totalCustomers,
                'registeredPlots' => $registeredPlots,
                'bookedPlots' => $bookedPlots,
                'mortgagedPlots' => $mortgagedPlots,
                'totalPlots' => $totalPlots,
                'plots' => $plots,
                'totalcompanyAccounts' => $totalcompanyAccounts,
            ];
        }

        return view('admin.dashboard', compact('projectData'));
    }



}
