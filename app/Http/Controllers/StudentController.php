<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(){
        //$students = Inbound_Student::orderBy('id', 'asc')->paginate(5);;
        return view('students.create_inbound');
    }

    public function index(){
        return view('students.inbound_table');
        
    }

    public function store(Request $request){
        dd($request);

        $data = $request->validate([
            'university_name' => 'required',
            'faculty_name' => 'nullable',
            'uni_city' => 'required',
            'uni_country' => 'required'
        ]);

        $newUni = University::create($data);

        
        // field name must match the column name in db
        $data_for_advisor_table = $request->validate([
            'advisor_fname' => 'required',
            'advisor_lname' => 'required',
            'advisor_email' => 'required'
        ]);

        $newAdvisor = Advisor::create($data_for_advisor_table);
        

        $request->validate([
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
            'arrival_date' => 'nullable'
     ]);
/*
        $student = new Inbound_Student;
        $student->name_title = $request->name_title;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->thai_fname = $request->thai_fname;
        $student->thai_lname = $request->thai_lname;
        $student->date_of_birth = $request->date_of_birth;
        $student->nationality = $request->nationality;
        $student->sex = $request->sex;
        $student->passport_num = $request->passport_num;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->country = $request->country;
        $student->degree = $request->degree;
        $student->university_id = $newUni->id;
        $student->degree = $request->degree;
        $student->email = $request->email;
        $student->lastname = $request->lastname;
        $student->lastname = $request->lastname;
        $student->lastname = $request->lastname;
        $student->lastname = $request->lastname;
        $student->lastname = $request->lastname;
        $student->save();
        */
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
            'university_id' => '8',
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
            'advisor_id' => '8',
     
        ]);



        // to save data to db
        //$newStudent = Inbound_Student::create($data_for_student_table);
        

        return redirect(route('product.inbound_data'));
        
    }

}

