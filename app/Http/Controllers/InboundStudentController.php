<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inbound_Student;
use App\Models\University;
use App\Models\Advisor;
use App\Models\StudentProcess;
use App\Models\Process;
use App\Http\Requests\DateQueryRequest;
use App\Utils\DateUtils;

class InboundStudentController extends Controller
{
    public function create(DateQueryRequest $request){

        $current_semester = DateUtils::getCurrentSemester();
        
        $current_year = date('Y');
        $current_year+= 543;
        // $maxYear = Process::max('year');
        // $years = range('2565', $maxYear);

        $semesters = ['s1'=>'ภาคต้น','s2'=>'ภาคปลาย'];

        $selected_year = $request->input('year', $current_year);
        
        $selected_semester = $semesters[$request->input('semester', $current_semester)]; 

        $query_semester = $request->input('semester', $current_semester);
        
        $distinctUniversityNames = University::getDistinctUniversityNames();
        $distinctFacultyNames = University::getDistinctFacultyNames();

        //$students = Inbound_Student::orderBy('id', 'asc')->paginate(5);
        return view('students.create_inbound',
        ['query_semester' => $query_semester,
        'selected_semester' => $selected_semester,
        'selected_year' => $selected_year,
        'distinctUniversityNames' => $distinctUniversityNames,
        'distinctFacultyNames' => $distinctFacultyNames]);
    }

    public function index(DateQueryRequest $request){

        $current_semester = DateUtils::getCurrentSemester();
        
        $current_year = date('Y');
        $maxYear = Process::max('year');
        $current_year += 543;
        
        $years = range('2565', $maxYear);

        $semesters = ['s1'=>'ภาคต้น','s2'=>'ภาคปลาย'];

        $query_semester = $request->input('semester', $current_semester);

        $selected_year = $request->input('year', $current_year);
        $selected_semester = $semesters[$request->input('semester', $current_semester)];

        $students = Inbound_Student::where('year', $selected_year)
                    ->where('semester', $selected_semester)
                    ->with('university','advisor','student_process')
                    ->orderBy('id', 'asc')
                    ->paginate(5);
                    //->get();

        return view('students.inbound_table',[
            'years' => $years,
            'semesters' => $semesters,
            'selected_year' => $selected_year,
            'selected_semester' => $selected_semester,
            'query_semester' => $query_semester,
            'students'=> $students]);
        
    }


    public function store(Request $request){

        $data = $request->validate([
            'name_title' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'thai_fname' => 'nullable',
            'thai_lname' => 'nullable',
            'date_of_birth' => 'required',
            'nationality' => 'required',
            'sex' => 'required',
            'passport_num' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'email' => 'required',
            'degree' => 'required',
            'exchange_program' => 'required',
            'semester' => 'required',
            'year' => 'required',
            'exchange_period' => 'required',
            'student_id' => 'required',
            'inbound_type' => 'required',
            'grading' => 'required',
            'english_test' => 'required',
            'english_score' => 'required',
            'student_status' => 'required',
            'arrival_date' => 'nullable',
            'university_name' => 'required',
            'faculty_name' => 'required',
            'uni_city' => 'required',
            'uni_country' => 'required',
            'advisor_fname' => 'required',
            'advisor_lname' => 'required',
            'advisor_email' => 'required'
        ]);

        //save advisor to db
        $newAdvisor = Advisor::create([
            'advisor_fname' => $request->advisor_fname,
            'advisor_lname' => $request->advisor_lname,
            'advisor_email' => $request->advisor_email,
        ]);

        // to check if it is university name in the db if so create a new university record if not
        //retrieve the university id and insert to column university id in student table
        $check_university = University::where('university_name', $request->university_name)
                                        ->where('faculty_name', $request->faculty_name)
                                        ->first();

        if(!$check_university) {
            $newUni = University::create([
                'university_name' => $request->university_name,
                'faculty_name' => $request->faculty_name,
                'uni_city' => $request->uni_city,
                'uni_country' => $request->uni_country,
            ]);

            $uni_id = $newUni->id;
        }else{
            $uni_id = $check_university->id;        
        }

        $newStudent = Inbound_Student::create([
            'name_title' => $request->name_title,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'thai_fname' => $request->thai_fname,
            'thai_lname' => $request->thai_lname,
            'date_of_birth' => $request->date_of_birth,
            'nationality' => $request->nationality,
            'sex' => $request->sex,
            'passport_num' => $request->passport_num,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'email' => $request->email,
            'university_id' => $uni_id,
            'degree' => $request->degree,
            'exchange_program' => $request->exchange_program,
            'semester' => $request->semester,
            'year' => $request->year,
            'exchange_period' => $request->exchange_period,
            'student_id' => $request->student_id,
            'inbound_type' => $request->inbound_type,
            'grading' => $request->grading,
            'english_test' => $request->english_test,
            'english_score' => $request->english_score,
            'student_status' => $request->student_status,
            'arrival_date' => $request->arrival_date, 
            'advisor_id' => $newAdvisor->id,
        ]);


        // to check if it is student id in the table student process 

        $student_process_list = [
            'ส่งอีเมลแจ้งรหัสนิสิตและชื่ออาจารย์ที่ปรึกษาแก่นิสิตชาวต่างชาติ พร้อมกำหนดการลงทะเบียน' => '12',
            'อีเมลถามเด็กว่ามาถึงวันไหน จัดงานปฐมนิเทศนิสิตแลกเปลี่ยนที่คณะ' => '13'
        ];
        // // untill end foreach in array
        
        for ($x = 0; $x <=1 ; $x++){
            $check_student_process = StudentProcess::where('student_id', $newStudent->id)
                                                ->first();
            if(!$check_student_process) {
                $newStudentProcess = StudentProcess::create([
                    'process_num'=> '8',
                    'process_name' => 'อีเมลยืนยันการเข้ารับศึกษาให้นิสิตแลกเปลี่ยนและส่งรายละเอียดเบื้องต้น',
                    'process_status' => 'Pending',
                    'year' => $request->year,
                    'semester' => $request->semester,
                    'student_id' => $newStudent->id
                ]);
            }else{
                foreach($student_process_list as $student_process => $process_num){
                    $newStudentProcess = StudentProcess::create([
                        'process_num' =>  $process_num,
                        'process_name' => $student_process,
                        'process_status' => 'Pending',
                        'year' => $request->year,
                        'semester' => $request->semester,
                        'student_id' => $newStudent->id
                    ]);
                }
            
            }
        }



        return redirect(route('student.index'))->with('success', 'succesfully created');
        
    }



    public function edit(Inbound_Student $student){
        $universities = University::get();

        $distinctUniversityNames = University::getDistinctUniversityNames();
        $distinctFacultyNames = University::getDistinctFacultyNames();      
        $uniq_universities = University::select('university_name')->distinct()->get();
        $student_processes = StudentProcess::where('student_id', $student->id)
                                            ->get();


        return view('students.student_detail', 
        ['student'=> $student,
         'universities'=> $universities,
         'distinctUniversityNames'=> $distinctUniversityNames,
         'distinctFacultyNames'=> $distinctFacultyNames,
         'uniq_universities'=> $uniq_universities,
         'student_processes'=> $student_processes,
        ]);
        
    }


    public function update(Request $request, Inbound_Student $student){


        $to_update_data = $request->validate([
            'name_title' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'thai_fname' => 'nullable',
            'thai_lname' => 'nullable',
            'date_of_birth' => 'required',
            'nationality' => 'required',
            'sex' => 'required',
            'passport_num' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'email' => 'required',
            'degree' => 'required',
            'exchange_program' => 'required',
            'semester' => 'required',
            'year' => 'required',
            'exchange_period' => 'required',
            'student_id' => 'required',
            'inbound_type' => 'required',
            'grading' => 'required',
            'english_test' => 'required',
            'english_score' => 'required',
            'student_status' => 'required',
            'arrival_date' => 'nullable',
            'university_name' => 'required',
            'faculty_name' => 'required',
            'uni_city' => 'required',
            'uni_country' => 'required',
            'advisor_fname' => 'required',
            'advisor_lname' => 'required',
            'advisor_email' => 'required'
        ]);

        $student_process_data_array = $request->student_process;

        foreach ($student_process_data_array as $std_process_id => $status) {
            $text_status = ($status == '1') ? 'Done' : 'Pending';
            $std_process = StudentProcess::find($std_process_id);
            $std_process->process_status = $text_status;
            $std_process->save();
        }

        $student->update($to_update_data);

        return redirect()->route('student.index')->with('success', 'succesfully updated');

    }

    public function delete(Inbound_Student $student, Request $request){
        $student->delete();
        return redirect()->route('student.index')->with('del', 'succesfully deleted');
    }

}
