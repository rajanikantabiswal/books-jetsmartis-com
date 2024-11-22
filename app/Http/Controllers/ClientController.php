<?php

namespace App\Http\Controllers;

use App\Models\BankDetails;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('created_at', 'desc')->get();
        return view('admin.partials.clients-table', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-cleint');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'is_individual' => 'required|boolean',
                'client_name' => 'required|string|max:255',
                'country_code' => 'nullable|string', // assuming country code is 2 letters
                'phone' => 'required|string|max:15|regex:/^[0-9]+$/', // allows only numbers
                'email' => 'required|email|max:255',
                'whatsapp' => 'nullable|string|max:15|regex:/^[0-9]+$/', // optional field, numeric
                'address' => 'required|string|max:500',
                'country_id' => 'nullable|integer|exists:countries,id', // assuming foreign key validation
                'state_id' => 'nullable|integer|exists:states,id',
                'city_id' => 'nullable|integer|exists:cities,id',
                'zip_code' => 'required|string|max:10',
                'registration_type' => 'required', // adjust options as needed
                'gst_no' => 'nullable|string|max:15|regex:/^[0-9A-Z]{15}$/', // GST format
                'state_code' => 'nullable|string|size:2',
                'pan_card' => 'nullable|string|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', // PAN format
                'bank_name' => 'nullable|string|max:255',
                'account_number' => 'nullable|string|max:20|regex:/^[0-9]+$/', // account number numeric
                'ifsc' => 'nullable|string|size:11|regex:/^[A-Z]{4}0[A-Z0-9]{6}$/', // IFSC format
                'benificiary' => 'nullable|string|max:255',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255'
            ]);


            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

        //    $value = $request->input('client_name');

        try {
            $is_individual = $request->is_individual;
            if ($is_individual) {
                $client = Client::create([
                    'is_individual' => $request->is_individual,
                    'client_name' =>  $request->individual_first_name . ' ' . $request->individual_last_name,
                    'phone' => $request->phone,
                    'email' => $request->email . $request->country_code,
                    'whatsapp' => $request->whatsapp,
                    'address' => $request->address,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'zip_code' => $request->zip_code,
                    'registration_type' => $request->registration_type ?? 'unregistered', 
                    'gst_no' => $request->gst_no ?? '',
                    'state_code' => $request->state_code,
                    'pan_card' => $request->pan_card,
                    'first_name' => $request->individual_first_name,
                    'last_name' => $request->individual_last_name
                ]);
            } else {
                $client = Client::create([
                    'is_individual' => $request->is_individual,
                    'client_name' => $request->client_name,
                    'phone' => $request->phone,
                    'email' => $request->email . $request->country_code,
                    'whatsapp' => $request->whatsapp,
                    'address' => $request->address,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'zip_code' => $request->zip_code,
                    'registration_type' => $request->registration_type,
                    'gst_no' => $request->gst_no ?? '',
                    'state_code' => $request->state_code,
                    'pan_card' => $request->pan_card,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name
                ]);
            }

            BankDetails::create([
                'client_id' => $client->id,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'ifsc' => $request->ifsc,
                'beneficiary' => $request->beneficiary,

            ]);
            session()->put('activeTab', 'clients');
            return response()->json(['success' => true, 'msg' => 'Client created']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }

    public function getClients()
    {
        $clients = Client::where('is_active', true)->get();
        return response()->json($clients);
    }
}
