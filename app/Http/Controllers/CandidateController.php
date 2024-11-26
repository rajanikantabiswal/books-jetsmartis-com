<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Client;
use App\Models\Company;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CandidateController extends Controller
{
    public function index(Request $request)
    {

        $totalCandidate = Candidate::count();
        $passedCandidate = Candidate::where('status', 'passed')->count();
        $failedCandidate = Candidate::where('status', 'failed')->count();
        $onHoldCandidate = Candidate::where('status', 'on-hold')->count();
        $rescheduledCandidate = Candidate::where('status', 'rescheduled')->count();

        $query = Candidate::query()->with(['company', 'exam', 'vendor', 'conducted_user']);


        if (Gate::allows('isAdmin')) {

            $totalCandidate = Candidate::count();
            $passedCandidate = Candidate::where('status', 'passed')->count();
            $failedCandidate = Candidate::where('status', 'failed')->count();
            $onHoldCandidate = Candidate::where('status', 'on-hold')->count();
            $rescheduledCandidate = Candidate::where('status', 'rescheduled')->count();

            $candidates = $query->latest();
        } else {

            $sevenDaysAgo = Carbon::now()->subDays(7);

            $totalCandidate = Candidate::where('conducted_date', '>=', $sevenDaysAgo)
                ->count();

            $passedCandidate = Candidate::where('conducted_date', '>=', $sevenDaysAgo)
                ->where('status', 'passed')
                ->count();

            $failedCandidate = Candidate::where('conducted_date', '>=', $sevenDaysAgo)
                ->where('status', 'failed')
                ->count();

            $onHoldCandidate = Candidate::where('conducted_date', '>=', $sevenDaysAgo)
                ->where('status', 'on-hold')
                ->count();

            $rescheduledCandidate = Candidate::where('conducted_date', '>=', $sevenDaysAgo)
                ->where('status', 'rescheduled')
                ->count();


            $query->where('conducted_date', '>=', $sevenDaysAgo);
        }


        if ($request->filled('from_date')) {
            $query->whereDate('conducted_date', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('conducted_date', '<=', $request->to_date);
        }


        if ($request->filled('exam_code')) {
            $examId = Exam::where('exam_code', $request->exam_code)->value('id'); // Get the exam ID
            if ($examId) {
                $query->where('exam_id', $examId);
            }
        }

        if ($request->filled('vendor_id')) {
            $examIds = Exam::where('vendor_id', $request->vendor_id)->pluck('id'); // Get all exam IDs for the vendor
            if ($examIds->isNotEmpty()) {
                $query->whereIn('exam_id', $examIds); // Use whereIn for multiple matches
            }
        }


        if ($request->filled('exam_id')) {
            $query->where('exam_id', $request->exam_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('conducted_by')) {
            $query->where('conducted_by', $request->conducted_by);
        }

        if ($request->filled('client_id')) {
            $query->where('client_id', $request->client_id);
        }


        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('first_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('last_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('email_id', 'LIKE', "%{$searchTerm}%");
            });
        }


        $candidates = $query->latest()->get();

        return view('candidate.index', compact(['candidates', 'totalCandidate', 'passedCandidate', 'failedCandidate', 'onHoldCandidate', 'rescheduledCandidate']));
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'country_code' => 'nullable|string|max:15',
                'phone' => 'nullable|string|max:15',
                'email_id' => 'nullable|email|max:255',
                'company_id' => 'required|string|max:255',
                'exam_id' => 'required|string|max:255',
                'vendor_id' => 'required|string|max:255',
                'conducted_date' => 'required|date',
                'conducted_by' => 'required|max:255',
                'client_id' => 'required|string',
                'status' => 'required|string',
                'remark' => 'nullable|string|max:500',
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400);
            }

            Candidate::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'country_code' => $request->country_code,
                'phone' => $request->phone,
                'email_id' => $request->email_id,
                'company_id' => $request->company_id,
                'exam_id' => $request->exam_id,
                'vendor_id' => $request->vendor_id,
                'conducted_date' => $request->conducted_date,
                'conducted_by' => $request->conducted_by,
                'client_id' => $request->client_id,
                'status' => $request->status,
                'remark' => $request->remark,
            ]);
            return response()->json(['success' => true, 'msg' => "Candidate created successfully"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'An error occurred while creating the candidate.']);
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
    public function update(Request $request)
    {
        $candidateId = $request->candidate_id;
        if ($candidateId) {
            try {
                $validator = Validator::make($request->all(), [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'country_code' => 'nullable|string|max:15',
                    'phone' => 'nullable|string|max:15',
                    'email_id' => 'nullable|email|max:255',
                    'company_id' => 'required|string|max:255',
                    'exam_id' => 'required|string|max:255',
                    'vendor_id' => 'required|string|max:255',
                    'conducted_date' => 'required|date',
                    'conducted_by' => 'required|max:255',
                    'client_id' => 'required|string',
                    'status' => 'required|string',
                    'remark' => 'nullable|string|max:500',
                ]);

                if ($validator->fails()) {
                    return response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                    ), 400);
                }

                $candidate = Candidate::find($candidateId);
                if ($candidate) {
                    $candidate->update([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'country_code' => $request->country_code,
                        'phone' => $request->phone,
                        'email_id' => $request->email_id,
                        'company_id' => $request->company_id,
                        'exam_id' => $request->exam_id,
                        'vendor_id' => $request->vendor_id,
                        'conducted_date' => $request->conducted_date,
                        'conducted_by' => $request->conducted_by,
                        'client_id' => $request->client_id,
                        'status' => $request->status,
                        'remark' => $request->remark,
                    ]);

                    return response()->json(['success' => true, 'msg' => "Candidate updated successfully"]);
                }
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'msg' => 'An error occurred while creating the candidate.']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            Candidate::where('id', $id)->delete();

            return response()->json(['success' => true, 'msg' => 'Candidate deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function getCandidate($cId)
    {
        try {
            $candidate = Candidate::with(['company', 'conducted_user', 'client', 'vendor', 'exam'])->where('id', $cId)->get();
            return response()->json(['success' => true, 'data' => $candidate]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }



    public function getCandidatesAPI(Request $request)
{
    $year = $request->input('year');
    $period = $request->input('period', 'all_time'); // Default to 'all_time' if not provided
    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');

    $candidates = Candidate::query();

    // Priority 1: If both `from_date` and `to_date` are set, apply the date range filter
    if ($fromDate && $toDate) {
        $candidates->whereBetween('conducted_date', [$fromDate, $toDate]);
    }
    // Priority 2: If only `from_date` is set
    elseif ($fromDate) {
        $candidates->where('conducted_date', '>=', $fromDate);
    }
    // Priority 3: If only `to_date` is set
    elseif ($toDate) {
        $candidates->where('conducted_date', '<=', $toDate);
    }
    // Priority 4: Apply `period` filter if set and not `all_time`
    elseif ($period && $period !== 'all_time') {
        if ($period === 'last_week') {
            $startOfLastWeek = now()->subWeek()->startOfWeek();
            $endOfLastWeek = now()->subWeek()->endOfWeek();
            $candidates->whereBetween('conducted_date', [$startOfLastWeek, $endOfLastWeek]);
        } elseif ($period === 'last_month') {
            $startOfLastMonth = now()->subMonthNoOverflow()->startOfMonth();
            $endOfLastMonth = now()->subMonthNoOverflow()->endOfMonth();
            $candidates->whereBetween('conducted_date', [$startOfLastMonth, $endOfLastMonth]);
        } elseif ($period === 'last_year') {
            $startOfLastYear = now()->subYear()->startOfYear();
            $endOfLastYear = now()->subYear()->endOfYear();
            $candidates->whereBetween('conducted_date', [$startOfLastYear, $endOfLastYear]);
        }
    }
    // Priority 5: Apply `year` filter if set
    elseif ($year) {
        $candidates->whereYear('conducted_date', $year);
    }

    // Default to all_time: No filters applied
    // This block is redundant since no conditions imply all records

    // Load related data
    $candidates->with(['company', 'client', 'exam', 'vendor', 'conducted_user']);

    // Get the results
    $results = $candidates->get();

    return response()->json($results);
}

}
