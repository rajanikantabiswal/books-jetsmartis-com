<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->get(); 
        return view('admin.partials.companies-table', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'display_name' => 'nullable|string|max:255'
        ]);

       
        try {
            Company::create([
                'company_name' => $validatedData['company_name'],
                'display_name'=> $validatedData['display_name']
            ]);
            session()->put('activeTab', 'companies');
            return response()->json(['success' => true, 'msg' => 'Company created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());
        session()->put('activeTab', 'companies');
        return response()->json(['success' => true, 'msg' => 'Company updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the company by ID and delete
        $company = Company::findOrFail($id);
        $company->delete();
        session()->put('activeTab', 'companies');
        // Return a JSON response
        return response()->json([
            'success' => true,
            'msg' => 'Company deleted successfully'
        ]);
    }


    public function toggleIsClient(Request $request)
    {
        try {
            $company = Company::find($request->company_id);
            $company->is_client = $request->is_client;
            $company->save();

            if ($request->is_client) {
                $msg = "This company is now a client.";
            } else {
                $msg = "This company is no longer a client.";
            }
            return response()->json(['success' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function toggleIsActive(Request $request)
    {
        try {
            $company = Company::find($request->company_id);
            $company->is_active = $request->is_active;
            $company->save();

            if ($request->is_active) {
                $msg = "Company activated.";
            } else {
                $msg = "Company deactivated";
            }
            return response()->json(['success' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function getCompanyDetails()
    {
       $companies = Company::get();
        return response()->json($companies);
    }

    
}
