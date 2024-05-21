<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inbound_Student;
use App\Models\University;
use App\Models\Advisor;
use App\Models\StudentProcess;
use Faker\Factory as Faker;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
require_once 'vendor/autoload.php';

class InboundStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
    {
        $faker = Faker::create();

        $newAdvisor = Advisor::create([
            'advisor_fname' => $faker->firstNameMale(),
            'advisor_lname' => $faker->lastName(),
            'advisor_email' => $faker->unique()->safeEmail,
        ]);

        $university_name = $faker->randomElement(['Ca Foscari University of Venice', 'University of Malaya', 'National University of Singapore']);
        $faculty_name = 'Faculty of arts';

        $check_university = University::where('university_name', $university_name)
                                        ->where('faculty_name', $faculty_name)
                                        ->first();

        if(!$check_university) {
            $newUni = University::create([
                'university_name' => $university_name,
                'faculty_name' => $faculty_name,
                'uni_city' => $faker->city(),
                'uni_country' => $faker->country(),
            ]);
            $uni_id = $newUni->id;
        }else{
            $uni_id = $check_university->id;        
        }
        
        // $newUni = University::create([
        //     'university_name' => $faker->randomElement(['Ca Foscari University of Venice', 'University of Malaya', 'National University of Singapore']),
        //     'faculty_name' => 'Faculty of arts',
        //     'uni_city' => $faker->city(),
        //     'uni_country' =>  $faker->country(),
        // ]);

        $collection = new Collection(['ภาคต้น', 'ภาคปลาย']);
        $random_sem = $collection->random();

        $random_year = 2567;
        $random_sem = 'ภาคปลาย';


        $newStudent = Inbound_Student::create([
            'name_title' => $faker->randomElement(['Mr.', 'Ms.', 'Mrs.']),
            'firstname' => $faker->firstNameMale(),
            'lastname' => $faker->lastName(),
            'thai_fname' => $faker->firstNameMale(),
            'thai_lname' => $faker->lastName(),
            'date_of_birth' => $faker->date(),
            'nationality' => $faker->randomElement(['Thai', 'Italian', 'American', 'Laos']),
            'sex' => $faker->randomElement(['Male', 'Female']),
            'passport_num' => Str::random(9),
            'address' => $faker->address() ,
            'city' => $faker->city(),
            'country' => $faker->country(),
            'zipcode' => $faker->postcode(),
            'email' =>$faker->unique()->safeEmail,
            'university_id' => $uni_id,
            'degree' => $faker->randomElement(["Bachelor", "Master", "Ph.D."]),
            'exchange_program' => $faker->randomElement(['balac.', 'thai']),
            'semester' => $random_sem,
            'year' => $random_year,
            'exchange_period' => $faker->randomElement(['1 ปีการศึกษา', '1 ภาคเรียน']),
            'student_id' => Str::random(5),
            'inbound_type' => $faker->randomElement(['F-level', 'U-level', 'Visiting','Visiting 7+1']),
            'grading' => $faker->randomElement(['ABCDF', 'S/U', 'V/W']),
            'english_test' => $faker->randomElement(['IELTS', 'TOEFL']),
            'english_score' => $faker->numberBetween(1, 10),
            'student_status' => 'Active',
            'arrival_date' => $faker->date(), 
            'advisor_id' => $newAdvisor->id,
        ]);


        $student_process_list = [
            'ส่งอีเมลแจ้งรหัสนิสิตและชื่ออาจารย์ที่ปรึกษาแก่นิสิตชาวต่างชาติ พร้อมกำหนดการลงทะเบียน' => '12',
            'อีเมลถามเด็กว่ามาถึงวันไหน จัดงานปฐมนิเทศนิสิตแลกเปลี่ยนที่คณะ' => '13'
        ];
        // // untill ec=nd foreach in array
        
        for ($x = 0; $x <=1 ; $x++){
            $check_student_process = StudentProcess::where('student_id', $newStudent->id)
                                                ->first();
            if(!$check_student_process) {
                $newStudentProcess = StudentProcess::create([
                    'process_num'=> '8',
                    'process_name' => 'อีเมลยืนยันการเข้ารับศึกษาให้นิสิตแลกเปลี่ยนและส่งรายละเอียดเบื้องต้น',
                    'process_status' => 'Pending',
                    'year' => $random_year,
                    'semester' => $random_sem,
                    'student_id' => $newStudent->id
                ]);
            }else{
                foreach($student_process_list as $student_process => $process_num){
                    $newStudentProcess = StudentProcess::create([
                        'process_num' =>  $process_num,
                        'process_name' => $student_process,
                        'process_status' => 'Pending',
                        'year' => $random_year,
                        'semester' => $random_sem,
                        'student_id' => $newStudent->id
                    ]);
                }
            
            }
        }

    }
}
