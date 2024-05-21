<?php

namespace App\Http\Controllers;
use App\Models\Inbound_Student;
use App\Models\University;
use App\Models\Advisor;
use App\Models\StudentProcess;
use App\Models\Process;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Negotiate;
use Illuminate\Http\Request;
use App\Http\Requests\DateQueryRequest;
use App\Utils\DateUtils;


class DashboardController extends Controller
{
    //
    public function index(DateQueryRequest $request){ 
        //find semester
        $current_semester = DateUtils::getCurrentSemester();
        $current_year = date('Y');
        $current_year += 543;
        $maxYear = Process::max('year');
        $semesters = ['s1'=>'ภาคต้น','s2'=>'ภาคปลาย'];
        $selected_year = $request->input('year', $current_year);
        if($maxYear == null ){
            $maxYear = $selected_year;
        }
        $years = range('2565', $maxYear);        
        $selected_semester = $semesters[$request->input('semester', $current_semester)];        
        $query_semester = $request->input('semester', $current_semester);

        //filter by university section
        $selectedUniversity = $request->input('university');

        //find the univesity id

        $expected_student_query = Inbound_Student::where('year', $selected_year)
                                ->where('semester', $selected_semester);

        $nego_query = Negotiate::where('year', $selected_year)
                        ->where('semester', $selected_semester);

        $come_student_query = Inbound_Student::where('student_status', 'Active')
                                ->where('year', $selected_year)
                                ->where('semester', $selected_semester);
        
        // if they select filter 'all' or have not recieved the input 
        if($selectedUniversity == 'all' || !isset($selectedUniversity) ){
            $nego_num = Negotiate::where('year', $selected_year)
                        ->where('semester', $selected_semester)
                        ->sum('qty');

            $expected_student_num = Inbound_Student::where('year', $selected_year)
                                ->where('semester', $selected_semester)
                                ->count();

            $come_student_num = Inbound_Student::where('student_status', 'Active')
                                            ->where('year', $selected_year)
                                            ->where('semester', $selected_semester)
                                            ->count();
        }else{
            $uni_id = University::where('university_name', $selectedUniversity)
                                    ->value('id');
            $nego_num = $nego_query->where('university_id', $uni_id)
                                    ->sum('qty');
            $expected_student_num = $expected_student_query->where('university_id', $uni_id)
                                                            ->count();
            $come_student_num = $come_student_query->where('university_id', $uni_id)
                                                    ->count();
        }


        // For student process tracking section
        $task8_completed_std_num = StudentProcess::where('process_status', 'Done')
                                                    ->where('process_num', '8')
                                                    ->where('year', $selected_year)
                                                    ->where('semester', $selected_semester)
                                                    ->count();

        $task12_completed_std_num = StudentProcess::where('process_status', 'Done')
                                                    ->where('process_num', '12')
                                                    ->where('year', $selected_year)
                                                    ->where('semester', $selected_semester)
                                                    ->count();

        $task13_completed_std_num = StudentProcess::where('process_status', 'Done')
                                                    ->where('process_num', '13')
                                                    ->where('year', $selected_year)
                                                    ->where('semester', $selected_semester)
                                                    ->count();

        $all_student_num = Inbound_Student::where('year', $selected_year)
                                ->where('semester', $selected_semester)
                                ->count();
        $distinctUniversityNames = University::getDistinctUniversityNames();

        return view('dashboard.inbound_dashboard', 
        ['years' => $years,
        'query_semester' => $query_semester,
        'semesters' => $semesters,
        'selected_year' => $selected_year,
        'selected_semester' => $selected_semester,
        'selectedUniversity' => $selectedUniversity,
        'nego_num' => $nego_num,
        'all_student_num' => $all_student_num,
        'expected_student_num' => $expected_student_num,
        'task8_completed_std_num' => $task8_completed_std_num,
        'task12_completed_std_num' => $task12_completed_std_num,
        'task13_completed_std_num' => $task13_completed_std_num,
        'distinctUniversityNames' => $distinctUniversityNames,
        'come_student_num' => $come_student_num]
            );
        
    }

    public function create_uni(DateQueryRequest $request)
    {   
        $current_semester = DateUtils::getCurrentSemester();
        $current_year = date('Y');
        $current_year += 543;
    
        //$maxYear = Process::max('year');
        //$years = range('2565', $maxYear);

        $semesters = ['s1'=>'ภาคต้น','s2'=>'ภาคปลาย'];

        //Retrieve the 'year' input from the request, or use the current year if not provided
        $selected_year = $request->input('year', $current_year);
        
        $selected_semester = $semesters[$request->input('semester', $current_semester)]; 
        
        $distinctUniversityNames = University::getDistinctUniversityNames();
        $distinctFacultyNames = University::getDistinctFacultyNames();

        $uni_num_data = DB::table('negotiates')
                            ->join('universities', 'negotiates.university_id', '=', 'universities.id')
                            ->select('negotiates.id','negotiates.qty', 'universities.university_name', 'universities.faculty_name')
                            ->where('year', $selected_year)
                            ->where('semester', $selected_semester)
                            ->get();

        return view('dashboard.add_uni',
        ['uni_num_data'=> $uni_num_data,
        'selected_year' => $selected_year,
        'distinctUniversityNames' => $distinctUniversityNames,
        'distinctFacultyNames' => $distinctFacultyNames,
        'selected_semester' => $selected_semester,]);
    }

    public function store_uni_num(Request $request )
    {
        $data = $request->validate([
            'university_name' => 'required',
            'faculty_name' => 'required',
            'qty' => 'required',
        ]);

        $university_id = University::where('university_name', $request->university_name)
                                        ->where('faculty_name', $request->faculty_name)
                                        ->value('id');

        $check_uni_nego = Negotiate::where('university_id', $university_id)
                                        ->where('semester', $request->selected_semester)
                                        ->where('year', $request->selected_year)
                                        ->value('id');

        // If there's no id or User is submitting the same universityname and same faculty -> save to db
        // If it has tell the user not to submit bro!
        if(!$check_uni_nego) {
            DB::table('negotiates')->insert(
                [
                    'university_id' => $university_id,
                    'qty' => $request->qty,
                    'semester' => $request->selected_semester,
                    'year' => $request->selected_year,
                ],
            );
            return Redirect::back();
        }else{
            return Redirect::back()->with('duplicate', 'You have saved this university and faculty already');
        }
    }
        

    public function destroy(Negotiate $negotiate, Request $request)
    {
        $negotiate->delete();

        return Redirect::back()->with('del', 'succesfully deleted');
    }
}
