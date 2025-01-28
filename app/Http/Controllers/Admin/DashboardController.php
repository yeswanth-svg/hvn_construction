<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerDetail;
use App\Models\EPI;
use App\Models\PlotLevelI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.dashboard');
    }


    public function reports()
    {
        //
        $plots = PlotLevelI::all();

        $customers = DB::table('customer_details')
            ->select(
                'customer_details.id as customer_id',
                'customer_details.plot_no',
                'customer_details.customer_name',
                'customer_details.total_plot_value',
                DB::raw('COALESCE(SUM(payment_details.amount), 0) as received_amount'),
                DB::raw('customer_details.total_plot_value - COALESCE(SUM(payment_details.amount), 0) as balance')
            )
            ->leftJoin('payment_details', 'customer_details.id', '=', 'payment_details.customer_id')
            ->groupBy(
                'customer_details.id',
                'customer_details.plot_no',
                'customer_details.customer_name',
                'customer_details.total_plot_value'
            )
            ->get();

        $customerDetails = CustomerDetail::all();

        return view('admin.reports', compact('plots', 'customers', 'customerDetails'));
    }

    public function show($id)
    {

        $details = CustomerDetail::with('project')->findOrFail($id);
        $plot_no = $details->plot_no;
        $plot_details = EPI::where('plot_no', $plot_no)->firstOrFail(); // Replace 'some_column' with the actual column name


        return view('admin.print', compact('details', 'plot_details'));
    }

}
