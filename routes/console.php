<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\DB;
use App\Utils\DateUtils;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    $processes = [
        1 => [
            'name' => 'อีเมลติดต่อมหาวิทยาลัยคู่สัญญาระดับคณะที่สนใจส่งนิสิตมาแลกเปลี่ยนคณะอักษรศาสตร์',
            'deadlines' => ['ธันวาคม', 'มิถุนายน']
        ],
        2 => [
            'name' => 'บันทึกและสรุปจำนวนและรายชื่อนิสิตแลกเปลี่ยนจากมหาวิทยาลัยคู่สัญญาระดับคณะ',
            'deadlines' => ['ต้นพฤษภาคม', 'ปลายกันยายน']
        ],
        3 => [
            'name' => 'รับบันทึกเสนอจำนวนและรายชื่อนิสิตแลกเปลี่ยนจากมหาวิทยาลัยคู่สัญญาระดับมหาวิทยาลัยผ่านสำนักบริหารวิรัชกิจ',
            'deadlines' => ['ต้นพฤษภาคม', 'ปลายกันยายน']
        ],
        4 => [
            'name' => 'จัดทำบันทึกเสนอชื่อนิสิตแลกเปลี่ยนที่ประสงค์เข้าศึกษาที่ Balac และภาควิชาภาษาไทย',
            'deadlines' => ['ต้นพฤษภาคม', 'ปลายกันยายน']
        ],
        5 => [
            'name' => 'Balac และภาควิชาภาษาไทย ตอบรับนิสิตแลกเปลี่ยน',
            'deadlines' => ['ตามที่วิรัชกิจกลางกำหนด','ตามที่วิรัชกิจกลางกำหนด']
        ],
        6 => [
            'name' => 'ส่งบันทึกตอบรับนิสิตแลกเปลี่ยนที่สมัครผ่านสำนักบริหารวิรัชกิจ',
            'deadlines' => ['กลางพฤษภาคม', 'กลางตุลาคม']
        ],
        7 => [
            'name' => 'บันทึกเสนอชื่อนิสิตแลกเปลี่ยนทั้งหมดเข้าบอร์ดคณะ',
            'deadlines' => ['กลางพฤษภาคม', 'กลางตุลาคม']
        ],
        8 => [
            'name' => 'อีเมลยืนยันการเข้ารับศึกษาให้นิสิตแลกเปลี่ยนและส่งรายละเอียดเบื้องต้น / Letter of Acceptance',
            'deadlines' => ['ต้นมิถุนายน','ต้นพฤศจิกายน']
        ],
        9 => [
            'name' => 'ทำบันทึกขอรหัสนิสิตให้เฉพาะนิสิตแลกเปลี่ยนระดับคณะถึงสำนักงานการทะเบียน',
            'deadlines' => ['กลางมิถุนายน', 'กลางพฤศจิกายน']
        ],
        10 => [
            'name' => 'รับรหัสนิสิตแลกเปลี่ยนระดับคณะจากสำนักทะเบียน',
            'deadlines' => ['ปลายมิถุนายน', 'ปลายพฤศจิกายน']
        ],
        11 => [
            'name' => 'รับรหัสนิสิตของนิสิตแลกเปลี่ยนระดับมหาวิทยาลัยจากสำนักบริหารวิรัชกิจ',
            'deadlines' => ['ปลายมิถุนายน', 'ปลายพฤศจิกายน']
        ],
        12 => [
            'name' => 'ส่งอีเมลแจ้งรหัสนิสิตและชื่ออาจารย์ที่ปรึกษาแก่นิสิตชาวต่างชาติ พร้อมกำหนดการลงทะเบียนแรกเข้า',
            'deadlines' => ['ต้นกรกฏาคม', 'ต้นธันวาคม']
        ],
        13 => [
            'name' => 'อีเมลถามเด็กว่ามาถึงวันไหน จัดงานปฐมนิเทศนิสิตแลกเปลี่ยนที่คณะ',
            'deadlines' => ['ต้นสิงหาคม', 'ต้นมกราคม']
        ]
    ];
    
    // TODO: confirm logic of getting current year/semester
    // $current_year = (int)date('Y');
    $current_year = 2568;
    $current_semester = DateUtils::getCurrentSemester();
    $sem = 1;
    if ($current_semester == 's2') {
        $sem = 2;
    }

    $insertedProcessIDs = [];

    for ($step_id = 1; $step_id <=13; $step_id++) {
        $pID = DB::table('processes')->insertGetId(
            [
                'step_id' => $step_id,
                'process_name' => $processes[$step_id]['name'],
                'process_status' => 'Pending',
                'deadline' => $processes[$step_id]['deadlines'][$sem-1],
                'semester' => $sem,
                'year' => $current_year,
                'exchange_type' => 'Inbound',
                'done_by' => 'xxx',
            ],
        );

        $insertedProcessIDs[] = $pID;
    }

    // seed the documents
    $doc_to_processes = [
        'ตัวอย่างอีเมล' => [1],
        'ตัวอย่างบันทึก' => [4,6,7,9],
        'ตัวอย่างเอกสาร' => [8],
        'Certificate of Admission' => [8],
    ];

    $doc_id = 1;
    foreach ($doc_to_processes as $doc_name => $concerned_processes) {
        foreach ($insertedProcessIDs as $i) {
            foreach($concerned_processes as $p) {
                if (($i-$insertedProcessIDs[0]+1) % 13 == $p) {
                    DB::table('processes_documents')->insert(
                        [
                            'process_id' => $i,
                            'document_id' => $doc_id
                        ]
                    );
                }
            }
        }
        $doc_id++;
    }

})->everyTenSeconds();

// Todo fix logic to this:
// ->yearlyOn(6, 1, '17:00')->yearlyOn(12, 1, '17:00');

// php artisan schedule:run
// php artisan schedule:list
