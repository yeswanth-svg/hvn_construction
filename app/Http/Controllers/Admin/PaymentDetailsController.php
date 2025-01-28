<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\CustomerDetail;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;

class PaymentDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($customerId)
    {
        $customer = CustomerDetail::findOrFail($customerId);
        $projectId = $customer->project_id;
        $paymentsDetails = $customer->payments; // Assuming the relationship is set up correctly
        // Get all payments for the customer in the specific project
        $receivedAmount = PaymentDetail::where('customer_id', $customerId)
            ->where('project_id', $projectId)
            ->sum('amount');

        $balance = $customer->total_plot_value - $receivedAmount;
        return view('admin.payment_details.index', compact('customer', 'paymentsDetails', 'receivedAmount', 'balance'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($customerId)
    {
        $customer = CustomerDetail::findOrFail($customerId); // Ensure the customer exists
        $company_accounts = CompanyAccount::all(); //
        return view('admin.payment_details.create', compact('customer', 'company_accounts'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $customerId)
    {
        // Validate the request
        $request->validate([
            'customer_id' => 'required|exists:customer_details,id',
            'project_id' => 'required|exists:project_information,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'mode_of_payment' => 'required|string',
            'details' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'attachments' => 'nullable|mimes:jpg,jpeg,png',
            'remarks' => 'nullable|string',
        ]);

        $payment = new PaymentDetail();
        $payment->customer_id = $request->customer_id;
        $payment->project_id = $request->project_id;
        $payment->amount = $request->amount;
        $payment->payment_date = $request->payment_date;
        $payment->mode_of_payment = $request->mode_of_payment;
        $payment->details = $request->details ?: '-';
        $payment->bank_name = $request->bank_name ?: '-';
        $payment->remarks = $request->remarks ?: '-';



        // Handle file upload if there's an attachment
        if ($request->hasFile('attachments')) {
            $attachment = $request->file('attachments');

            // Generate a unique name for the file
            $attachmentName = time() . '_' . $attachment->getClientOriginalName();

            // Specify the directory where you want to store the file
            $directory = public_path('payment_attachment');

            // Create the directory if it doesn't exist
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Move the file to the target directory with the new name
            $attachment->move($directory, $attachmentName);

            // Update the payment record with the new attachment name
            $payment->attachments = $attachmentName;
            // dd($payment->attachments);
        } else {
            $payment->attachments = $request->attachments ?: 'none';
        }


        $payment->save();


        // Redirect back to the payment list with a success message
        return redirect()->route('admin.customer-details.payment-details.index', $customerId)
            ->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($customerId)
    {
        $customer = CustomerDetail::findOrFail($customerId);
        $projectId = $customer->project_id;

        // Get all payments for the customer in the specific project
        $receivedAmount = PaymentDetail::where('customer_id', $customerId)
            ->where('project_id', $projectId)
            ->sum('amount');

        $balance = $customer->total_plot_value - $receivedAmount;

        return view('admin.payment_details.show', compact('customer', 'receivedAmount', 'balance'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $payment = PaymentDetail::findOrFail($id);
        $customer = CustomerDetail::findOrFail($payment->customer_id);
        $company_accounts = CompanyAccount::all();
        return view('admin.payment_details.edit', compact('payment', 'customer', 'company_accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'customer_id' => 'required|exists:customer_details,id',
            'project_id' => 'required|exists:project_information,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'mode_of_payment' => 'required|string',
            'details' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'attachments' => 'nullable|file',
            'remarks' => 'nullable|string',
        ]);
        $customerId = $request->customer_id;

        $payment = PaymentDetail::findOrFail($id);

        $payment->customer_id = $request->customer_id;
        $payment->project_id = $request->project_id;
        $payment->amount = $request->amount;
        $payment->payment_date = $request->payment_date;
        $payment->mode_of_payment = $request->mode_of_payment;
        $payment->details = $request->details ?: '-';
        $payment->bank_name = $request->bank_name ?: '-';
        $payment->remarks = $request->remarks ?: '-';

        // Handle file upload if there's an attachment
        if ($request->hasFile('attachments')) {
            // Delete the old attachment file if it exists
            if ($payment->attachments && file_exists(public_path('payment_attachment/' . $payment->attachments))) {
                unlink(public_path('payment_attachment/' . $payment->attachments));
            }
            // Get the new attachment file
            $attachment = $request->file('attachments');
            $attachmentName = time() . '_' . $attachment->getClientOriginalName();
            $directory = public_path('payment_attachment');
            // Create the directory if it doesn't exist
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            // Move the new file to the directory
            $attachment->move($directory, $attachmentName);

            // Update the payment record with the new attachment name
            $payment->attachments = $attachmentName;
        }


        $payment->update();

        // Redirect back to the payment list with a success message
        return redirect()->route('admin.customer-details.payment-details.index', $customerId)
            ->with('success', 'Payment Updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $payment = PaymentDetail::findOrFail($id);
        if (file_exists('payment_attachment/' . $payment->attachments)) {
            # code...
            unlink('payment_attachment/' . $payment->attachments);
        }

        $payment->delete();

        return redirect()->back()->with('success', 'Payment deleted successfully!');
    }
}
