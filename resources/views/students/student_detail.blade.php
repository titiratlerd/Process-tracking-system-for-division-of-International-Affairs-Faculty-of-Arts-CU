<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Inbound Student') }}
        </h2>
    </x-slot> --}}
    <div class="grow">
        <div class="flex top-header items-center">
            <a href="{{route('student.index')}}">
                <svg  width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.0607 17.5607C22.6464 16.9749 22.6464 16.0251 22.0607 15.4393C21.4749 14.8536 20.5251 14.8536 19.9393 15.4393L11.9393 23.4393C11.6464 23.7322 11.5 24.1161 11.5 24.5C11.5 24.7034 11.5405 24.8973 11.6138 25.0742C11.687 25.2511 11.7955 25.4168 11.9393 25.5607L19.9393 33.5607C20.5251 34.1464 21.4749 34.1464 22.0607 33.5607C22.6464 32.9749 22.6464 32.0251 22.0607 31.4393L16.6213 26H36C36.8284 26 37.5 25.3284 37.5 24.5C37.5 23.6716 36.8284 23 36 23H16.6213L22.0607 17.5607Z" fill="#1A202E"/>
                </svg>
            </a>
            <p class="text-2xl font-bold grow">
                {{$student->firstname}} {{$student->lastname}}
            </p>
    </div>

    <div class=" bg-gray-50 content-container">
        <div class="max-w-7xl mx-auto">
            <div class="py-2">
                <form action="{{route('student.update', ['student' => $student])}}" method="POST" enctype="multipart/formdata" id="myForm">
                    @csrf 
                    @method('put')
                    
                    <div class="student-form">
                        <!-- One form page for each page in the form-->
                        <div class="form-page">
                            <div class="flex justify-between items-center">
                                <h1 class="text-3xl font-semibold">{{$student->firstname}} {{$student->lastname}}</h1>
                                <div class="overflow-auto">
                                    <div class="float-right">
                                        <button class="p-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"type="submit">Update</button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-baseline gap-3">
                                <label class="block text-md font-medium leading-6 text-gray-900">สถานะการแลกเปลี่ยน</label>
                                <select class ="text-sm mt-2 mb-0 px-2 py-1" id="student_status" type="text" name="student_status">
                                    <option value="Active">แลกเปลี่ยนตามปกติ</option>
                                    <option value="Inactive">ยกเลิกการแลกเปลี่ยน</option>
                                </select>
                                @error('student_status')
                                    <div class="validate-msg">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="checkbox-group flex flex-col my-2">

                            @foreach($student_processes as $student_processes)

                            <div class="checkbox-item flex flex-row gap-2 my-1 items-center">

                                <input type="hidden" name="student_process[{{ $student_processes->id}}]" value="{{ $student_processes->process_status == 'Done' ? '1' : '2' }}" id="statusInput{{ $student_processes->process_num}}">
                                {{-- <input type="hidden" name="student_process" value="{{ $student_processes->id}}"> --}}
                                {{-- <input type="hidden" name="student_process_currentStatus" value="{{ $student_processes->process_status }}"> --}}
                                <input id="student_process{{ $student_processes->process_num}}" type="checkbox" class="custom-checkbox border border-slate-400 text-green-500 rounded w-[20px] h-[20px]" @if($student_processes->process_status == 'Done') checked @endif>
                                    {{-- @if(($student_processes->process_status == 'Done'))
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="green" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 16.17L5.83 13L4.41 14.41L9 19L21 7L19.59 5.59L9 16.17Z"/>
                                        </svg>
                                    @endif --}}

                                <div class="mx-2">
                                    <p class="py-0.5 pr-0.3 w-[30px] h-[30px] text-center rounded-full text-white font-light {{$student_processes->process_status === "Done" ? "bg-pink-400" : "bg-slate-400"}}">{{ $student_processes->process_num }}</p>
                                </div>
                                <div class="mx-2">
                                    <p >{{ $student_processes->process_name }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="flex justify-center">
                        <hr class="divider">
                    </div>
                            <h2 class="text-xl text-pink-500 font-semibold">ข้อมูลส่วนตัว</h2>
                            <!-- One input-group for each row in the form-->                        
                            <section class="input-group">
                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">คำนำหน้า</label>
                                    <select class = "drop-down" id="name_title" type="text" name="name_title" value="{{$student->name_title}}">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Mrs.">Mrs.</option>
                                    </select>
                                    @error('name-title')
                                        <div class="validate-msg">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900" >ชื่อ(ภาษาอังกฤษ)</label>
                                    <input type="text" name="firstname" class="form-control" value="{{$student->firstname}}"/>
                                    @error('firstname')
                                        <div class="validate-msg">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">นามสกุล(ภาษาอังกฤษ)</label>
                                    <input type="text" name="lastname" class="form-control" value="{{$student->lastname}}"/>
                                    @error('lastname')
                                        <div class="validate-msg">{{$message}}</div>
                                    @enderror
                                </div>
                            </section>

                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ชื่อ(ภาษาไทย)</label>
                                        <input type="text" name="thai_fname" class="form-control" value="{{$student->thai_fname}}"/>
                                        @error('thai_fname')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">นามสกุล(ภาษาไทย)</label>
                                        <input type="text" name="thai_lname" class="form-control" value="{{$student->thai_lname}}"/>
                                        @error('thai_lname')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">เพศ</label>
                                        <select class = "drop-down" id="sex" type="text" name="sex" value="{{$student->sex}}">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        @error('sex')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                            </section>

                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">วันเดือนปีเกิด</label>
                                        <input type="date" name="date_of_birth" value="{{$student->date_of_birth}}"/>
                                        @error('date_of_birth')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">สัญชาติ</label>
                                        <input type="text" name="nationality" class="form-control" value="{{$student->nationality}}" />
                                        @error('nationality')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">เลขที่ passport</label>
                                        <input type="text" name="passport_num" class="form-control" value="{{$student->passport_num}}"/>
                                        @error('passport_num')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                            </section>

                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ที่อยู่</label>
                                        <input type="text" name="address" class="form-control" value="{{$student->address}}"/>
                                        @error('address')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">เมือง/จังหวัด</label>
                                        <input type="text" name="city" class="form-control" value="{{$student->city}}"/>
                                        @error('city')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    
                            </section>
                     

                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ประเทศ</label>
                                        <select id="country" name="country" class="form-control">
                                        <?php
                                            $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                                        ?>
                                        @foreach($countries as $country)
                                            <option value="{{ $country }}" @if(old('type', $student->country) === $country) selected @endif>{{ $country }}</option>
                                        @endforeach
                                        </select>
                                        @error('country')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">รหัสไปรษณีย์</label>
                                        <input type="text" name="zipcode" class="form-control" value="{{$student->zipcode}}"/>
                                        @error('zipcode')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$student->email}}"/>
                                        @error('email')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                            </section>
                        </div>

                        <div class="flex justify-center">
                            <hr class="divider">
                        </div>
                        

                        <div class="form-page">
                            <h2 class="text-xl text-pink-500 font-semibold">ข้อมูลการแลกเปลี่ยน</h2>
                            <!-- One input-group for each row in the form-->
                            

                            <section class="input-group">
                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">ชื่อมหาวิทยาลัยต้นทาง</label>
                                    <input value="{{$student->university->university_name}}" type="text" name="university_name" class="form-control" list="university_name"/>
                                    <datalist id="university_name">
                                        @foreach ($distinctUniversityNames as $uni)
                                            <option>{{ $uni}}</option>
                                            @endforeach
                                    </datalist>
                                    @error('university_name')
                                        <div class="validate-msg">{{$message}}</div>
                                    @enderror
                                </div>
    
                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">ชื่อคณะต้นทาง</label>
                                    <input value="{{$student->university->faculty_name}}" type="text" name="faculty_name" class="form-control" list="faculty_name"/>          
                                    <datalist id="faculty_name">
                                        @foreach ($distinctFacultyNames as $faculty)
                                            <option>{{$faculty}}</option>
                                        @endforeach
                                    </datalist> 
                                    
                                    @error('faculty_name')
                                        <div class="validate-msg">{{$message}}</div>
                                    @enderror
                                </div>

                                
                            </section>

                            <section class="input-group">

                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">เมือง</label>
                                    <input type="text" name="uni_city" class="form-control" value="{{$student->university->uni_city}}"/>
                                    @error('ีuni_city')
                                        <div class="validate-msg">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">ประเทศ</label>
                                    <select id="uni_country" name="uni_country" class="drop-down">
                                        <?php
                                            $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                                        ?>
                                        @foreach($countries as $country)
                                            <option value="{{ $country }}" @if(old('type', $student->university->uni_country) === $country) selected @endif>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    @error('uni_country')
                                        <div class="validate-msg">{{$message}}</div>
                                    @enderror
                                </div>
                            </section>

                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ระดับการศึกษา</label>
                                        <?php 
                                            $degrees = array("Bachelor","Master","Ph.D.");
                                        ?>
                                        <select class=""  id="degree" type="text" name="degree">
                                            @foreach($degrees as $degree)
                                                <option value="{{ $degree }}" @if(old('type', $student->degree) === $degree) selected @endif>{{ $degree }}</option>
                                            @endforeach
                                        </select>                                       
                                        @error('degree')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">หลักสูตรที่มาแลกเปลี่ยน</label>
                                        <select class = "drop-down" id="search-option" type="text" name="exchange_program">
                                            <option value="balac">Language and Culture (BALAC)</option>
                                            <option value="thai">Thai Language</option>
                                        </select>                                      
                                        @error('exchange_program')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ภาคเรียนที่มาแลกเปลี่ยน</label>
                                        <?php 
                                            $semesters = array("ภาคต้น","ภาคปลาย");
                                        ?>
                                        <select class ="drop-down" id="search-option" type="text" name="semester">
                                            @foreach($semesters as $semester)
                                                <option value="{{ $semester }}" @if(old('type', $student->semester) === $semester) selected @endif>{{ $semester }}</option>
                                            @endforeach

                                            
                                        </select>
                                        @error('semester')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ปีการศึกษา</label>
                                        <input type="number" name="year" min="0" step="1" value="{{$student->year}}"/>
                                        @error('year')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                            </section>

                            <section class="input-group">
                                    <div class="input-item">
                                        <?php 
                                            $exchange_periods = array("1 ภาคเรียน","1 ปีการศึกษา");
                                        ?>
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ระยะเวลาที่มาแลกเปลี่ยน</label>
                                        <select class = "drop-down" id="search-option" type="text" name="exchange_period">
                                            @foreach($exchange_periods as $exchange_period)
                                                <option value="{{ $exchange_period }}" @if(old('type', $student->exchange_period) === $exchange_period) selected @endif>{{ $exchange_period }}</option>
                                            @endforeach
                                        </select>
                                        @error('exchange_period')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">รหัสนิสิต</label>
                                        <input type="text" name="student_id" value="{{$student->student_id}}" />
                                        @error('student_id')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ประเภทการแลกเปลี่ยนแบบ Inbound</label>
                                        <?php 
                                            $inbound_types = array("F-level","U-level","Visiting","Visiting 7+1");
                                        ?>
                                        <select class = "drop-down" id="inbound_type" type="text" name="inbound_type">
                                            @foreach($inbound_types as $inbound_type)
                                                <option value="{{ $inbound_type }}" @if(old('type', $student->inbound_type) === $inbound_type) selected @endif>{{ $inbound_type }}</option>
                                            @endforeach
                                        </select>
                                        @error('inbound_type')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">การประเมินผลการศึกษา</label>
                                        <?php 
                                            $gradings = array("ABCDF","S/U","V/W");
                                        ?>
                                        <select class = "drop-down" id="search-option" type="text" name="grading">
                                            @foreach($gradings as $grading)
                                                <option value="{{ $grading }}" @if(old('type', $student->grading) === $grading) selected @endif>{{ $grading }}</option>
                                            @endforeach
                                        </select>
                                        @error('grading')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror   
                                    </div>
                            </section>

                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">การทดสอบภาษาอังกฤษ</label>
                                        <select class = "drop-down" id="english_test" type="text" name="english_test" >
                                            <option value="IELTS">IELTS</option>
                                            <option value="TOEFL">TOEFL</option>
                                        </select>
                                        @error('english_test')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">คะแนน</label>
                                        <input type="number" name="english_score" min="0" step="1" value="{{$student->english_score}}"/>
                                        @error('english_score')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">สถานะการแลกเปลี่ยนของนิสิต</label>
                                        <select class = "drop-down" id="student_status" type="text" name="student_status">
                                            <option value="Active">แลกเปลี่ยนตามปกติ</option>
                                            <option value="Inacive">ยกเลิกการแลกเปลี่ยน</option>
                                        </select>
                                        @error('student_status')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div> --}}
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">วันที่คาดว่าจะเดินทางถึงไทย</label>
                                        <input type="date" name="arrival_date" class="form-control" value="{{$student->arrival_date}}"/>
                                        @error('arrival_date')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                            </section>


                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ชื่ออาจารย์ที่ปรึกษา</label>
                                        <input type="text" name="advisor_fname" class="form-control" value="{{$student->advisor->advisor_fname}}" />
                                        @error('advisor_fname')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">นามสกุลอาจารย์ที่ปรึกษา</label>
                                        <input type="text" name="advisor_lname"  class="form-control" value="{{$student->advisor->advisor_lname}}"/>
                                        @error('advisor_lname')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Email อาจารย์ที่ปรึกษา</label>
                                        <input type="email" name="advisor_email" class="form-control" value="{{$student->advisor->advisor_email}}"/>
                                        @error('advisor_email')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                            </section>
                        </div>

                        
                    
                </form>



        </div>
    </div>  
    </div>
</x-app-layout>