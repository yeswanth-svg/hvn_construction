<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerDetail;
use App\Models\EPI;
use App\Models\PlotLevelI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    //

    public function plot_reports()
    {
        $plots = PlotLevelI::all();


        return view('admin.reports.plot_details_reports', compact('plots'));

    }

    public function financial_reports()
    {
        $customers = CustomerDetail::with('payments') // Ensure payments are loaded
            ->select(
                'id',
                'plot_no',
                'customer_name',
                'total_plot_value',
                DB::raw('(SELECT COALESCE(SUM(amount), 0) FROM payment_details WHERE payment_details.customer_id = customer_details.id) as received_amount'),
                DB::raw('customer_details.total_plot_value - (SELECT COALESCE(SUM(amount), 0) FROM payment_details WHERE payment_details.customer_id = customer_details.id) as balance')
            )
            ->get(); // Using Eloquent, not DB::table

        return view('admin.reports.financial_reports', compact('customers'));
    }




    public function customers_reports()
    {


        $customerDetails = CustomerDetail::all();

        return view('admin.reports.customer_reports', compact('customerDetails'));
    }



    public function show($id)
    {

        $details = CustomerDetail::with('project')->findOrFail($id);
        $plot_no = $details->plot_no;
        $plot_details = EPI::where('plot_no', $plot_no)->firstOrFail(); // Replace 'some_column' with the actual column name


        return view('admin.print', compact('details', 'plot_details'));
    }
}
