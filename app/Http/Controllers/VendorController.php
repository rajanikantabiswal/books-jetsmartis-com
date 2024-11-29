<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')->get();  // Fetch all vendors
        return view('admin.partials.vendors-table', compact('vendors'));
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
            'vendor_name' => 'required|string|max:255'
        ]);

        try {
            Vendor::create([
                'vendor_name' => $validatedData['vendor_name']
            ]);
            session()->put('activeTab', 'vendors');
            return response()->json(['success' => true, 'msg' => 'Vendor created successfully!']);
            
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
        $vendor = Vendor::findOrFail($id);
        $vendor->update($request->all());
        session()->put('activeTab', 'vendors');
        return response()->json(['success' => true, 'msg' => 'Vendor updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Find the company by ID and delete
         $vendor = Vendor::findOrFail($id);

        if ($vendor->exams()->exists()) {
            return response()->json([
                'success' => false,
                'msg' => 'This vendor is linked to one or more exams and cannot be deleted.'
            ]);
        } else {
            $vendor->delete();
            session()->put('activeTab', 'vendors');
           
            return response()->json([
                'success' => true,
                'msg' => 'Vendor deleted successfully'
            ]);
        }
    }

    public function toggleIsActive(Request $request)
    {
        try {
            $vendor = Vendor::find($request->vendor_id);
            $vendor->is_active = $request->is_active;
            $vendor->save();

            if ($request->is_active) {
                $msg = "Vendor activated.";
            } else {
                $msg = "Vendor deactivated";
            }
            return response()->json(['success' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function getActiveVendors(){
        $vendors = Cache::remember('active_vendors', 60, function () {
            return Vendor::where('is_active', true)->get();
        });
        return response()->json($vendors);
    }
}
