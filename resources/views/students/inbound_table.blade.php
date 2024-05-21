<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inbound Student Data') }}
        </h2>
    </x-slot> --}}
    <div class="top-header">
        <p class="text-3xl font-bold grow">
            Inbound Student Data
        </p>
        <div class="semester-year-form">
            <form method="get" action="{{ route('student.index') }}">

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
            <p class="sem-year-head">{{ $selected_semester }} / {{ $selected_year }}</p>
            <div class="create-bt mt-4">
                <a class="text-[14px] font-bold bg-pink-200 text-gray-700 hover:bg-pink-400 hover:text-white mt-4 py-2 px-4 rounded pointer-events-auto"href="{{route('student.create')}}?semester={{ $query_semester }}&year={{ $selected_year }}">เพิ่มข้อมูลนิสิต</a>
            </div>
            @if($message = Session::get('success'))
                <div class="success">
                    <p>{{$message}}</p>
                </div>
            @endif
            @if($message = Session::get('del'))
                <div class="alert">
                    <p>{{$message}}</p>
                </div>
            @endif

            @if(count($students) === 0)
                <p class="text-center">ยังไม่มีข้อมูลนิสิต</p>

            @else

            <table class="w-full text-sm text-left rtl:text-right text-slate-900 dark:text-slate-900 my-4">
                <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-900">  
                <tr class="text-base h-12 odd:bg-white odd:dark:bg-white even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th class="font-bold text-center">รหัสนิสิต</th>
                    <th class="font-bold">ชื่อ-นามสกุล</th>
                    <th class="font-bold">ชื่อมหาวิทยาลัย</th>
                    <th class="font-bold">สัญชาติ</th>
                    <th class="font-bold">หลักสูตร</th>
                    <th class="font-bold text-center">ขั้นตอนติดต่อกับนิสิต</th>
                    <th class="w-28"></th>
                    <th class=""></th>
                </thead>
                <tbody>
                </tr >

                @foreach($students as $student)
                    <tr class="text-[16px] h-16 odd:bg-white odd:dark:bg-gray-200 even:bg-gray-100 even:dark:bg-gray-500 ">
                        
                        <td class="text-center">{{$student->student_id}}</td>
                        <td>{{$student->firstname}} {{$student->lastname}}</td>
                        <td>{{$student->university->university_name}}</td>
                        <td>{{$student->nationality}}</td>
                        <td>{{$student->exchange_program}}</td>
                        <td class="text-center">
                            
                            <div class="checkbox-item flex flex-row gap-1 my-1 items-center justify-center">
                                @foreach($student->student_process as $process)
                                <div class="mx-2">
                                    <p class="py-1 pr-0.3 w-[30px] h-[30px] text-center rounded-full text-white font-light {{$process->process_status === "Done" ? "bg-pink-400" : "bg-slate-400"}}">{{ $process->process_num }}</p>
                                </div>
                                @endforeach
                            </div>
                    </td>
                        <td>
                            <a class=" text-[14px] p-5 border bg-white border-pink-300 hover:bg-pink-300 text-gray-800 hover:text-gray-50  py-1 px-2 rounded pointer-events-auto" href="{{route('student.edit', ['student' => $student])}}">ดูรายละเอียด</a>
                        </td>
                    
                        <td>
                            <form method="POST" action="{{route('student.destroy', ['student' => $student])}}">
                                @csrf 
                                @method('delete')
                                <button class="py-2 px-2 text-red-500 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>                            </form>
                        </td>

                    </tr>

                @endforeach
            </table>
            {{ $students->links() }} {{-- Render pagination links --}}
            @endif

</div>
</x-app-layout>