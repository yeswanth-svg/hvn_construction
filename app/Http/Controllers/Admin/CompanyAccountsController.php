<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use Illuminate\Http\Request;

class CompanyAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $accounts = CompanyAccount::all();
        return view('admin.company_accounts.index', compact('accounts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.company_accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'account_no' => 'required',
            'ifsc_code' => 'required|string|max:255',
        ]);

        CompanyAccount::create($request->all());

        return redirect()->route('admin.company-accounts.index')->with('success', 'Company Account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $account = CompanyAccount::findOrFail($id);
        return view('admin.company_accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $account = CompanyAccount::findOrFail($id);
        return view('admin.company_accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'account_no' => 'required',
            'ifsc_code' => 'required|string|max:255',
        ]);
        $account = CompanyAccount::findOrFail($id);
        $account->update($request->all());
        return redirect()->route('admin.company-accounts.index')->with('success', 'Company Account updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        CompanyAccount::find($id)->delete();

        return redirect()->route('admin.company-accounts.index')->with('success', 'Company Account deleted successfully.');
    }
}
