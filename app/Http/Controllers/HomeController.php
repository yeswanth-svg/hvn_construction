<?php

namespace App\Http\Controllers;

use App\Models\CustomerDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    // Show the dashboard page
    public function dashboard()
    {
        $phonenumber = auth()->user()->phone_number;

        $customerDetails = CustomerDetail::where('phone_number', $phonenumber)->first();

        return view('dashboard', compact('customerDetails'));
    }
}
