<head>
    <script type="module" src="http://localhost:5173/resources/js/progress_tracking.js"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex">
        <div class="bg-slate-800 text-white px-16 py-16">
            <p class="mx-2 whitespace-nowrap">SomSri Meesuk</p>
        </div>
        <div class="grow">
            <div class="flex py-8 px-24 mb-8 border-b border-slate-200 shadow-slate-200 shadow-md">
                <p class="text-3xl font-bold grow">
                    Inbound Progress Tracking
                </p>
                <div class="">
                    <form method="get" action="{{ route('inbound.progress_tracking.edit') }}">
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
                    
                    <button class="bg-pink-400 text-white px-4 py-2 rounded-lg" type="submit">ค้นหา</button>
                </form>
            </div>
        </div>
    
    <div class="mx-24"> 
        <p class="font-bold text-xl">{{ $selected_semester }} / {{ $selected_year }}</p>
        
        <ul>
            @for ($i = 0; $i < 13; $i++)
            <li>
                <div class="border-b border-slate-300">
                    <p class="my-2">{{$processes[$i]->deadline}}</p>
                    <div class="flex my-2">
                        <div class="mr-2">
                            <form method="post" id="process-form-{{$i}}" action="{{ route('inbound.progress_tracking.update') }}">
                                @csrf
                                @method('put')
                                <input type="hidden" name="processId" value="{{ $processes[$i]->id }}">
                                <input type="hidden" name="currentStatus" value="{{ $processes[$i]->process_status }}">
                                <button type="submit" class="checkbox-btn border border-slate-400 text-white rounded w-[20px] h-[20px] ">
                                    @if(($processes[$i]->process_status == 'Successful'))
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="red" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 16.17L5.83 13L4.41 14.41L9 19L21 7L19.59 5.59L9 16.17Z"/>
                                        </svg>
                                    @endif
                                </button>
                            </form>
                        </div>
                        
                        <div class="mx-2">
                            <p class="py-0.5 pr-0.3 w-[30px] h-[30px] text-center rounded-full text-white font-light {{$processes[$i]->process_status == "Successful" ? "bg-pink-400" : "bg-slate-400"}}">{{ $i+1 }}</p>
                        </div>
                        
                        <div  class="mx-2">
                            <p id="expand-name-{{$i+1}}" class="expand-name font-bold cursor-pointer">{{$processes[$i]->process_name}}</p>
                        <div class="process-details-{{$i+1}}" style="display:none;">
                            @if (($processes[$i]->documents))
                            <p class="my-2">เอกสารที่ต้องใช้ : {{$processes[$i]->documents}}</p>
                            @endif
                            <p class="my-2">สถานะ : {{$processes[$i]->process_status == 'Successful' ? 'ดำเนินการเสร็จสิ้น' : 'รอดำเนินการ'}}</p>
                            @if (($processes[$i]->process_status == 'Successful'))
                            <p class="my-2">ดำเนินการเมื่อ : {{$processes[$i]->updated_at }}</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mx-2">
                        <button id="expand-btn-{{$i+1}}" class="expand-btn">v</button>
                    </div>
                </div>
            </div>
        </li>
        @endfor
        </ul>
    </div>
    </div>
    </div>
</body>