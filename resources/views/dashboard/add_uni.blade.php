<x-app-layout>
    {{-- <x-slot name="header">
        <div class="head flex flex-row justify-center items-center">
        <a href="{{route('inbound.dashboard.index')}}">
            <svg  width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.0607 17.5607C22.6464 16.9749 22.6464 16.0251 22.0607 15.4393C21.4749 14.8536 20.5251 14.8536 19.9393 15.4393L11.9393 23.4393C11.6464 23.7322 11.5 24.1161 11.5 24.5C11.5 24.7034 11.5405 24.8973 11.6138 25.0742C11.687 25.2511 11.7955 25.4168 11.9393 25.5607L19.9393 33.5607C20.5251 34.1464 21.4749 34.1464 22.0607 33.5607C22.6464 32.9749 22.6464 32.0251 22.0607 31.4393L16.6213 26H36C36.8284 26 37.5 25.3284 37.5 24.5C37.5 23.6716 36.8284 23 36 23H16.6213L22.0607 17.5607Z" fill="#1A202E"/>
            </svg>
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create university') }}
        </h2>
        </div>
    </x-slot> --}}

    <div class="grow">
        <div class="flex top-header border-b  bg-white items-center">
            <a href="{{route('inbound.dashboard.index')}}">
                <svg  width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.0607 17.5607C22.6464 16.9749 22.6464 16.0251 22.0607 15.4393C21.4749 14.8536 20.5251 14.8536 19.9393 15.4393L11.9393 23.4393C11.6464 23.7322 11.5 24.1161 11.5 24.5C11.5 24.7034 11.5405 24.8973 11.6138 25.0742C11.687 25.2511 11.7955 25.4168 11.9393 25.5607L19.9393 33.5607C20.5251 34.1464 21.4749 34.1464 22.0607 33.5607C22.6464 32.9749 22.6464 32.0251 22.0607 31.4393L16.6213 26H36C36.8284 26 37.5 25.3284 37.5 24.5C37.5 23.6716 36.8284 23 36 23H16.6213L22.0607 17.5607Z" fill="#1A202E"/>
                </svg>
            </a>
            <p class="text-2xl font-bold grow">
                เพิ่มข้อมูลจำนวนนิสิตที่รับได้
            </p>
    </div>

    <div class="content-container">
        <div class="max-w-7xl mx-auto ">
        <p class="sem-year-head">{{ $selected_semester }} / {{ $selected_year }}</p>
        @if($message = Session::get('del'))
            <div class="alert">
                <p>{{$message}}</p>
            </div>
        @endif

        @if($message = Session::get('duplicate'))
            <div class="alert">
                <p>{{$message}}</p>
            </div>
        @endif
        
        <div class="container flex justify-center flex-col items-center">
        <form action="{{route('inbound.dashboard.store_uni')}}" method="POST" enctype="multipart/formdata">
            @csrf 
            @method('post')
            <div class="add-uni flex flex-row justify-center px-4 py-6 gap-6 items-end">
            <div class="group flex flex-row justify-center">
                <div class="input-item">
                    <label class="block text-sm font-medium leading-6 text-gray-900">ชื่อมหาวิทยาลัยต้นทาง</label>
                    <input type="text" name="university_name" class="form-control"  list="university_name"/>
                    <datalist id="university_name">
                        @foreach ($distinctUniversityNames as $university)
                            <option value="{{$university}}">{{$university}}</option>
                        @endforeach
                    </datalist>
                    @error('university_name')
                        <div class="validate-msg ">{{$message}}</div>
                    @enderror
                </div>
                <div class="input-item">
                    <label class="block text-sm font-medium leading-6 text-gray-900">ชื่อคณะต้นทาง</label>
                    <input list="faculty_name" type="text" name="faculty_name" class="form-control"/>          
                    <datalist id="faculty_name">
                        @foreach ($distinctFacultyNames as $faculty)
                            <option value="{{$faculty}}">{{$faculty}}</option>
                        @endforeach
                    </datalist> 
                    
                    @error('faculty_name')
                        <div class="validate-msg">{{$message}}</div>
                    @enderror
                </div>
            
                <div class="input-item">
                    <label class="block text-sm font-medium leading-6 text-gray-900">จำนวนนิสิต</label>
                    <input type="number" name="qty" min="0" step="1" />
                    @error('qty')
                        <div class="validate-msg ">{{$message}}</div>
                    @enderror
                </div>

            </div>
            <input type="hidden" name="selected_semester" value = "{{ $selected_semester }}">
            <input type="hidden" name="selected_year" value = "{{ $selected_year }}">

                <button class="p-5 bg-pink-400 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded text-xl" type="submit" @disabled($errors->isNotEmpty())>+</button>
            </div>
        </form>
            <hr class="divider">

            </div>
        @if(isset($uni_num_data))
        @foreach ($uni_num_data as $uni)

        <div class="flex flex-col gap-4 m-4">
            
            <div class="group flex flex-row justify-center items-end gap-3">
                
                <div class="input-item">
                    <label class="block text-sm font-medium leading-6 text-gray-900">ชื่อมหาวิทยาลัยต้นทาง</label>
                    <input type="text" name="university_name" class="form-control"  list="university_name" value="{{$uni->university_name}}" readonly/>
                </div>
                

                <div class="input-item">
                    <label class="block text-sm font-medium leading-6 text-gray-900">ชื่อคณะต้นทาง</label>
                    <input list="faculty_name" type="text" name="faculty_name" class="form-control" value="{{$uni->faculty_name}}" readonly/>          
                    </datalist> 
                </div>
                
                <div class="input-item">
                    <label class="block text-sm font-medium leading-6 text-gray-900">จำนวนนิสิต</label>
                    <input type="number" name="qty" min="0" step="1" value="{{$uni->qty}}" readonly/>
                </div>
                
                
                <form method="POST" action="{{route('inbound.dashboard.delete', ['negotiate' => $uni->id])}}">
                    @csrf
                    @method('DELETE')
                    <button class="py-2 px-2 text-red-500 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </form>
                
                

            </div>
            @endforeach
        </div>

        @endif
    


    </div>
</div>
</div>

    

    

    

</x-app-layout>
