<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcessDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seed the process
        $process_id = 1;
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
        
        for ($year = 2565; $year <= 2567; $year++) {
            for ($sem = 1; $sem <= 2; $sem++) {
                for ($step_id = 1; $step_id <=13; $step_id++, $process_id++) {
                    DB::table('processes')->insert(
                        [
                            'id' => $process_id,
                            'step_id' => $step_id,
                            'process_name' => $processes[$step_id]['name'],
                            'process_status' => 'Pending',
                            'deadline' => $processes[$step_id]['deadlines'][$sem-1],
                            'semester' => $sem,
                            'year' => $year,
                            'exchange_type' => 'Inbound',
                            'done_by' => 'xxx',
                        ],
                    );
                }
            }
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
            DB::table('documents')->insert(
                [
                    'id' => $doc_id,
                    'document' => $doc_name
                ],
            );

            for ($i = 1; $i < $process_id; $i++) {
                foreach($concerned_processes as $p) {
                    if ($i % 13 == $p) {
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
    }
}
