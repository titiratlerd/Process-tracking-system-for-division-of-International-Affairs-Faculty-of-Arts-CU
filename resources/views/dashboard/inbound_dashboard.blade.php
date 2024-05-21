<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inbound Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="top-header">
        <p class="text-3xl font-bold grow text-gray-800">
            Inbound Student Dashboard
        </p>

        <div class="year-sem-form">
            <form method="get" action="{{ route('inbound.dashboard.index') }}">

                <label for="semester">ภาคเรียน</label>
                <select id="semester" name="semester">
                    @foreach ($semesters as $key => $thai_display)
                    <option value="{{$key}}" {{ ($selected_semester == $thai_display ? "selected": "") }}>{{$thai_display}}</option>
                    @endforeach
                </select>
                    
                <label for="year">ปีการศึกษา</label>
                <select id="year" name="year">
                    @foreach ($years as $y)
                        <option value="{{$y}}" {{ ($selected_year == $y ? "selected": "") }}>{{$y}}</option>
                    @endforeach
                </select>
                
                <button class="top-search-bt" type="submit">ค้นหา</button>
            </form>
        </div>
            
    </div>

    <div class="content-container">
    <div class="flex flex-col gap-5">
        <p class="sem-year-head">{{ $selected_semester }} / {{ $selected_year }}</p>
        <h2 class="text-xl text-center font-bold">สรุปภาพรวมจำนวนนิสิต</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-14 flex flex-col gap-5 border py-4 rounded-lg">
            <div class="filter-group flex justify-end">
                <form action="{{ route('inbound.dashboard.index') }}" method="get">
                    <select class = "drop-down" id="university" type="text" name="university">
                            <option value="all">ทั้งหมด</option>
                        @foreach ($distinctUniversityNames as $university)
                            <option value="{{$university}}" {{ ($selectedUniversity == $university ? "selected": "") }}>{{$university}}</option>
                        @endforeach
                    </select>
                    <button class=" text-sm border border-pink-300 text-center text-gray-600 hover:bg-pink-300 font-bold my-4 py-2.5  px-4 rounded pointer-events-auto" type="submit">Filter</button>
                </form>
            </div>
                <div class="bg-white overflow-hidden  sm:rounded-lg flex flex-row gap-10 justify-centerpx-8 ">
                    <div class="first-group flex flex-col gap-4 justify-center ">
                        <div class="student-num-card">
                            <h3 class="text-lg">จำนวนนิสิตที่รับได้</h3>
                            <div class="label py-2">
                                @if($nego_num == 0)
                                    ยังไม่มีข้อมูล
                                @else
                                <p class= "text-gray-800 font-bold text-xl">{{$nego_num}}</p>
                                @endif
                            </div>
                        </div>
                        
                        <a class="bg-pink-300 text-center text-white hover:bg-pink-500 font-bold my-4 py-2 px-4 rounded pointer-events-auto" href="{{route('inbound.dashboard.create_uni')}}?semester={{ $query_semester }}&year={{ $selected_year }}">เพิ่มข้อมูล                    
                        </a>

                    </div>
                    
                    <div class="student-num-card">
                        <h3 class="text-lg">จำนวนนิสิตที่คาดว่าจะมาแลกเปลี่ยน</h3>
                        <div class="label text-xl font-bold py-2">
                            {{$expected_student_num}}
                        </div>
                    </div>

                    <div class="student-num-card">
                        <h3 class="text-lg">จำนวนนิสิตที่มาแลกเปลี่ยนตามจริง</h3>
                        <div class="label font-bold py-2 text-xl">
                            {{$come_student_num}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-5">
                <h2 class="text-xl text-center font-bold">สรุปภาพรวมขั้นตอนที่ติดต่อกับนิสิต</h2>
                    <div class=" border borderw-full bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col gap-5 justify-center py-5 px-10">
                        <div class="first-group flex flex-row gap-4 justify-between ">
                                <p>ขั้นตอน</p>
                                <p>ดำเนินการเสร็จสิ้นแล้ว</p>                            
                        </div>

                        <div class="student-process-line flex flex-row items-center justify-between gap-9">
                            <div class="student-process-group flex justify-center gap-5 items-center px-3 py-3">
                                <p class="py-0.5 pr-0.3 w-[30px] h-[30px] text-center rounded-full text-white font-light {{$task8_completed_std_num === $expected_student_num ? "bg-pink-400" : "bg-slate-400"}}">8</p>
                                <p >อีเมลยืนยันการเข้ารับศึกษาให้นิสิตแลกเปลี่ยนและส่งรายละเอียดเบื้องต้น</p>  
                            </div>
                            <p>{{$task8_completed_std_num}}/{{$all_student_num}} คน</p>
                        </div>
                        

                        <div class="student-process-line flex flex-row items-center justify-between gap-9">
                            <div class="student-process-group flex justify-center gap-5 items-center px-3 py-3">
                                <p class="py-0.5 pr-0.3 w-[30px] h-[30px] text-center rounded-full text-white font-light {{$task12_completed_std_num === $expected_student_num ? "bg-pink-400" : "bg-slate-400"}}">12</p>
                                <p >ส่งอีเมลแจ้งรหัสนิสิตและชื่ออาจารย์ที่ปรึกษาแก่นิสิตชาวต่างชาติ พร้อมกำหนดการลงทะเบียน</p>  
                            </div>
                            <p>{{$task12_completed_std_num}}/{{$all_student_num}} คน</p>
                        </div>

                        <div class="student-process-line flex flex-row items-center justify-between gap-9">
                            <div class="student-process-group flex justify-center gap-5 items-center px-3 py-3">
                                <p class="py-0.5 pr-0.3 w-[30px] h-[30px] text-center rounded-full text-white font-light {{$task13_completed_std_num === $expected_student_num ? "bg-pink-400" : "bg-slate-400"}} ">13</p>
                                <p >อีเมลถามเด็กว่ามาถึงวันไหน จัดงานปฐมนิเทศนิสิตแลกเปลี่ยนที่คณะ</p>  
                            </div>
                            <p>{{$task13_completed_std_num}}/{{$all_student_num}} คน</p>
                        </div>
   
                    </div>
                </div>
    </div>
</div>


</x-app-layout>
