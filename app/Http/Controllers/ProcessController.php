<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DateQueryRequest;
use App\Models\Process;
use App\Utils\DateUtils;

class ProcessController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function edit(DateQueryRequest $request): View
    {
        
        $current_semester = DateUtils::getCurrentSemester();
        
        $current_year = date('Y');
        // $maxYear = $current_year
        $current_year += 543;
        $maxYear = Process::max('year');
        $years = range('2565', $maxYear);

        $semesters = ['s1'=>'ภาคต้น','s2'=>'ภาคปลาย'];
        
        $selected_year = $request->input('year', $current_year);
        $selected_semester = $semesters[$request->input('semester', $current_semester)];
        
        $processes = Process::where('year', $selected_year)
                    ->where('semester', $selected_semester)
                    ->with('documents')
                    ->get();

        foreach ($processes as $process) {
            $document_names = $process->documents->pluck('document')->toArray();
            $process->documents = implode(', ', $document_names);
        }

        return view('progress_tracking.index', [
            'years' => $years,
            'semesters' => $semesters,
            'selected_year' => $selected_year,
            'selected_semester' => $selected_semester,
            'processes' => $processes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Find the process model based on the process ID
        $process = Process::find($request->input('processId'));

        // Update the status to 'success' or perform any other necessary actions
        if ($request->input('currentStatus') == 'Pending') {
            $process->process_status = 'Successful';
        } else {
            $process->process_status = 'Pending';
        }
        $process->save();

        $current_year = date('Y');
        $years = range('2565', $current_year);
        $semesters = ['s1'=>'ภาคต้น','s2'=>'ภาคปลาย'];
        
        $selected_year = $process->year;
        $selected_semester = $process->semester;
        
        $processes = Process::where('year', $selected_year)
                    ->where('semester', $selected_semester)
                    ->with('documents')
                    ->get();

        foreach ($processes as $process) {
            $document_names = $process->documents->pluck('document')->toArray();
            $process->documents = implode(', ', $document_names);
        }

        return Redirect::back();
    }
}