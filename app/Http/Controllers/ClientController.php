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
        $validator = Validator::make(
            $request->all(),
            [
                'is_individual' => 'required|boolean',
                'client_name' => request('is_individual') == 1 ? 'nullable|string|max:255' : 'required|string|max:255',
                'individual_first_name' => request('is_individual') == 1 ? 'required|string|max:255' : 'nullable|string|max:255',
                'individual_last_name' => request('is_individual') == 1 ? 'required|string|max:255' : 'nullable|string|max:255',
                'country_code' => 'nullable|string',
                'phone' => 'nullable|string|max:15|regex:/^[0-9]+$/',
                'email' => 'nullable|email|max:255',
                'whatsapp' => 'nullable|string|max:15|regex:/^[0-9]+$/',
                'address' => 'nullable|string|max:500',
                'country_id' => 'required|integer|exists:countries,id',
                'state_id' => 'required|integer|exists:states,id',
                'city_id' => 'nullable|integer|exists:cities,id',
                'zip_code' => 'nullable|string|max:10',
                'registration_type' => request('is_individual') == 1 ? 'nullable' : 'required',
                'gst_no' => [
                    'nullable',
                    'required_unless:registration_type,unregistered', // Required unless registration_type is unregistered
                    'string',
                    'max:15',
                    'regex:/^[0-9A-Z]{15}$/', // Valid GST format
                ],
                'state_code' => 'nullable|string|size:2',
                'pan_card' => 'required|string',
                'bank_name' => 'required|string|max:255',
                'account_number' => 'required',
                'ifsc' => 'required',
                'beneficiary' => 'required|string|max:255',
                'first_name' => request('is_individual') == 1 ? 'nullable' : 'required|string|max:255',
                'last_name' => request('is_individual') == 1 ? 'nullable' : 'required|string|max:255'
            ],
            [
                'individual_first_name.required' => 'The first name is required for individuals.',
                'individual_last_name.required' => 'The first name is required for individuals.',
            ]
        );


        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);
        }

        //    $value = $request->input('client_name');

        try {
            $is_individual = $request->is_individual;
            if ($is_individual) {
                $client = Client::create([
                    'is_individual' => $request->is_individual,
                    'client_name' =>  $request->individual_first_name . ' ' . $request->individual_last_name,
                    'phone' => $request->phone ?? '',
                    'country_code' => $request->country_code,
                    'email' => $request->email ?? '',
                    'whatsapp' => $request->whatsapp ?? '',
                    'address' => $request->address ?? '',
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'zip_code' => $request->zip_code,
                    'registration_type' => 'unregistered',
                    'pan_card' => $request->pan_card,
                    'first_name' => $request->individual_first_name,
                    'last_name' => $request->individual_last_name
                ]);
            } else {
                $client = Client::create([
                    'is_individual' => $request->is_individual,
                    'client_name' => $request->client_name,
                    'phone' => $request->phone ?? '',
                    'country_code' => $request->country_code,
                    'email' => $request->email ?? '',
                    'whatsapp' => $request->whatsapp ?? '',
                    'address' => $request->address ?? '',
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
        $client = Client::with('country', 'state', 'city', 'bankDetails')->find($client->id);

        return response()->json([
            'success' => true,
            'data' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client = Client::findOrFail($client->id);

        $validator = Validator::make(
            $request->all(),
            [
                'is_individual' => 'required|boolean',
                'client_name' => request('is_individual') == 1 ? 'nullable|string|max:255' : 'required|string|max:255',
                'individual_first_name' => request('is_individual') == 1 ? 'required|string|max:255' : 'nullable|string|max:255',
                'individual_last_name' => request('is_individual') == 1 ? 'required|string|max:255' : 'nullable|string|max:255',
                'country_code' => 'nullable|string',
                'phone' => 'nullable|string|max:15|regex:/^[0-9]+$/',
                'email' => 'nullable|email|max:255',
                'whatsapp' => 'nullable|string|max:15|regex:/^[0-9]+$/',
                'address' => 'nullable|string|max:500',
                'country_id' => 'required|integer|exists:countries,id',
                'state_id' => 'required|integer|exists:states,id',
                'city_id' => 'nullable|integer|exists:cities,id',
                'zip_code' => 'nullable|string|max:10',
                'registration_type' => request('is_individual') == 1 ? 'nullable' : 'required',
                'gst_no' => [
                    'nullable',
                    'required_unless:registration_type,unregistered',
                    'string',
                    'max:15',
                    'regex:/^[0-9A-Z]{15}$/', // Valid GST format
                ],
                'state_code' => 'nullable|string|size:2',
                'pan_card' => 'required',
                'bank_name' => 'required|string|max:255',
                'account_number' => 'required',
                'ifsc' => 'required',
                'beneficiary' => 'required|string|max:255',
                'first_name' => request('is_individual') == 1 ? 'nullable' : 'required|string|max:255',
                'last_name' => request('is_individual') == 1 ? 'nullable' : 'required|string|max:255'
            ],
            [
                'individual_first_name.required' => 'The first name is required for individuals.',
                'individual_last_name.required' => 'The first name is required for individuals.',
            ]
        );


        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);
        }

        try {
            $is_individual = $request->is_individual;
            if ($is_individual) {
                $client->is_individual = $request->is_individual;
                $client->client_name = $request->individual_first_name . ' ' . $request->individual_last_name;
                $client->phone = $request->phone ?? '';
                $client->country_code = $request->country_code;
                $client->email = $request->email ?? '';
                $client->whatsapp = $request->whatsapp ?? '';
                $client->address = $request->address ?? '';
                $client->country_id = $request->country_id;
                $client->state_id = $request->state_id;
                $client->city_id = $request->city_id;
                $client->zip_code = $request->zip_code;
                $client->registration_type = 'unregistered';
                $client->pan_card = $request->pan_card;
                $client->first_name = $request->individual_first_name;
                $client->last_name = $request->individual_last_name;
                $client->save();
            } else {
                $client->is_individual = $request->is_individual;
                $client->client_name = $request->client_name;
                $client->phone = $request->phone ?? '';
                $client->country_code = $request->country_code;
                $client->email = $request->email ?? '';
                $client->whatsapp = $request->whatsapp ?? '';
                $client->address = $request->address ?? '';
                $client->country_id = $request->country_id;
                $client->state_id = $request->state_id;
                $client->city_id = $request->city_id;
                $client->zip_code = $request->zip_code;
                $client->registration_type = $request->registration_type;
                $client->gst_no = $request->gst_no ?? '';
                $client->state_code = $request->state_code;
                $client->pan_card = $request->pan_card;
                $client->first_name = $request->first_name;
                $client->last_name = $request->last_name;
                $client->save();
            }

            $bankDetails = $client->bankDetails;
            if ($bankDetails) {
                // Update existing BankDetails
                $bankDetails->update([
                    'bank_name' => $request->bank_name,
                    'account_number' => $request->account_number,
                    'ifsc' => $request->ifsc,
                    'beneficiary' => $request->beneficiary,
                ]);
            } else {
                // Create new BankDetails
                BankDetails::create([
                    'client_id' => $client->id,
                    'bank_name' => $request->bank_name,
                    'account_number' => $request->account_number,
                    'ifsc' => $request->ifsc,
                    'beneficiary' => $request->beneficiary,
                ]);
            }

            session()->put('activeTab', 'clients');
            return response()->json(['success' => true, 'msg' => 'Client updated']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }


        session()->put('activeTab', 'clients');
        return response()->json(['success' => true, 'msg' => 'Client updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the company by ID and delete
        $client = Client::findOrFail($id);

        if ($client->candidates()->exists()) {
            return response()->json([
                'success' => false,
                'msg' => 'This client is linked to one or more candidates and cannot be deleted.'
            ]);
        } else {
            $client->delete();
            session()->put('activeTab', 'clients');

            return response()->json([
                'success' => true,
                'msg' => 'Client deleted successfully'
            ]);
        }
    }

    public function getClients()
    {
        $clients = Client::where('is_active', true)->get();
        return response()->json($clients);
    }

    public function toggleIsActive(Request $request)
    {
        try {
            $client = Client::find($request->client_id);
            $client->is_active = $request->is_active;
            $client->save();

            if ($request->is_active) {
                $msg = "Client activated.";
            } else {
                $msg = "Client deactivated";
            }
            return response()->json(['success' => true, 'msg' => $msg]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
