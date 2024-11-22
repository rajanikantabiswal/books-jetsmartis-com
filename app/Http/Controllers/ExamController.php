<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::with('vendor')->get();  // Fetch all exams
        return view('admin.partials.exams-table', compact('exams'));
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
            'exam_name' => 'required|string|max:255',
            'vendor_id' => 'required|integer',
            'exam_code' => 'nullable|string|max:50'
        ]);

        try {
            Exam::create([
                'exam_name' => $validatedData['exam_name'],
                'vendor_id' => $validatedData['vendor_id'],
                'exam_code' => $validatedData['exam_code']
            ]);
            session()->put('activeTab', 'exams');
            return response()->json(['success' => true, 'msg' => 'Exam created successfully!']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            Exam::where('id', $id)->delete();

            return response()->json(['success' => true, 'msg' => 'Exam deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }


    public function getExams($vendorId = null)
    {
        if ($vendorId) {
            // Fetch exams based on vendorId
            $exams = Exam::with('vendor')->where('vendor_id', $vendorId)->get();
        } else {
            $exams = Exam::with('vendor')->get();
        }

        return response()->json($exams);
    }

   public function searchExamCodes(Request $request){
    $term = $request->input('term');
    $exams = Exam::where('exam_code', 'like', "%$term%")->get();
    return response()->json($exams);
   }

    public function getExamByCode(Request $request)
    {
        $examCode = $request->exam_code;
        $exam = Exam::where('exam_code', $examCode)->with('vendor')->first();
        return response()->json($exam);
    }

    public function getExamCodes(){
        $examCodes = Exam::whereNotNull('exam_code')->pluck('exam_code');  // Fetch all vendors
        return response()->json($examCodes);
    }
}
