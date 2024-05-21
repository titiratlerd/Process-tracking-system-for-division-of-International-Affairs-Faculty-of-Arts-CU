<x-app-layout>

    <div class="grow">
        <div class="flex top-header border-b border-slate-200 shadow-slate-200 shadow-md bg-white items-center">
            <a href="{{route('student.index')}}">
                <svg  width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.0607 17.5607C22.6464 16.9749 22.6464 16.0251 22.0607 15.4393C21.4749 14.8536 20.5251 14.8536 19.9393 15.4393L11.9393 23.4393C11.6464 23.7322 11.5 24.1161 11.5 24.5C11.5 24.7034 11.5405 24.8973 11.6138 25.0742C11.687 25.2511 11.7955 25.4168 11.9393 25.5607L19.9393 33.5607C20.5251 34.1464 21.4749 34.1464 22.0607 33.5607C22.6464 32.9749 22.6464 32.0251 22.0607 31.4393L16.6213 26H36C36.8284 26 37.5 25.3284 37.5 24.5C37.5 23.6716 36.8284 23 36 23H16.6213L22.0607 17.5607Z" fill="#1A202E"/>
                </svg>
            </a>
            <p class="text-2xl font-bold grow">
                เพิ่มข้อมูลนิสิต Inboundd
            </p>
    </div>

    <div class="content-container">
        <div class="max-w-7xl mx-auto">
            <div class="py-2">
                <form action="{{route('student.store')}}" method="POST" enctype="multipart/formdata">
                    @csrf 
                    @method('post')
                    <div class="student-form">
                        <!-- One form page for each page in the form-->
                        <div class="form-page tab">
                            <h2 class="text-xl text-pink-500 font-semibold">ข้อมูลการแลกเปลี่ยน</h2>
                            <!-- One input-group for each row in the form-->                        
                            <section class="input-group">
                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">ชื่อมหาวิทยาลัยต้นทาง</label>
                                    <input type="text" name="university_name" class="form-control"  list="university_name"/>
                                    <datalist id="university_name">
                                        @foreach ($distinctUniversityNames as $university)
                                            <option value="{{$university}}">{{$university}}</option>
                                        @endforeach
                                    </datalist>
                                    @error('university_name')
                                        <div class="validate-msg">{{$message}}</div>
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

                                
                            </section>

                            <section class="input-group">
                               

                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">เมือง</label>
                                    <input type="text" name="uni_city" class="form-control" />
                                    @error('ีuni_city')
                                        <div class="validate-msg">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="input-item">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">ประเทศ</label>
                                    <?php
                                            $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                                    ?>
                                    <select id="uni_country" name="uni_country" class="drop-down">
                                        @foreach($countries as $country)
                                            <option value="{{ $country }}">{{ $country }}</option>
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
                                        <select class="form-control"  id="degree" type="text" name="degree">
                                            @foreach($degrees as $degree)
                                                <option value="{{ $degree }}" >{{ $degree }}</option>
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
                                    {{-- <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ช่วงเวลาที่มาแลกเปลี่ยน</label>
                                        <?php 
                                        $semesters = array("ภาคต้น","ภาคปลาย");
                                    ?>
                                    <select class ="drop-down" id="search-option" type="text" name="semester">
                                        @foreach($semesters as $semester)
                                            <option value="{{ $semester }}" @if(old('type', $selected_semester) === $semester) selected @endif>{{ $semester }}</option>
                                        @endforeach

                                        
                                    </select>
                                        @error('semester')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ปีการศึกษา</label>
                                        <input type="number" name="year" min="0" step="1" value="{{$selected_year}}"/>
                                        @error('year')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div> --}}
                            </section>

                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ระยะเวลาที่มาแลกเปลี่ยน</label>
                                        <select class = "select-op" id="search-option" type="text" name="exchange_period">
                                            <option value="1 ภาคเรียน">1 ภาคเรียน</option>
                                            <option value="1 ปีการศึกษา">1 ปีการศึกษา</option>
                                        </select>
                                        @error('exchange_period')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">รหัสนิสิต</label>
                                        <input type="text" name="student_id"  />
                                        @error('student_id')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ประเภทการแลกเปลี่ยนแบบ Inbound</label>
                                        <select class = "drop-down" id="inbound_type" type="text" name="inbound_type">
                                            <option value="F-level">F-level</option>
                                            <option value="U-level">U-level</option>
                                            <option value="Visiting">Visiting</option>
                                            <option value="Visiting 7+1">Visiting 7+1</option>
                                        </select>
                                        @error('inbound_type')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">การประเมินผลการศึกษา</label>
                                        <select class = "drop-down" id="search-option" type="text" name="grading">
                                            <option value="ABCDF">ABCDF</option>
                                            <option value="S/U">S/U</option>
                                            <option value="V/W">V/W</option>
                                        </select>
                                        @error('grading')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror   
                                    </div>
                            </section>

                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">การทดสอบภาษาอังกฤษ</label>
                                        <select class = "drop-down" id="english_test" type="text" name="english_test">
                                            <option value="IELTS">IELTS</option>
                                            <option value="TOEFL">TOEFL</option>
                                        </select>
                                        @error('english_test')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">คะแนน</label>
                                        <input type="number" name="english_score" min="0" step="1" />
                                        @error('english_score')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">สถานะการแลกเปลี่ยนของนิสิต</label>
                                        <select class = "drop-down" id="student_status" type="text" name="student_status">
                                            <option value="Active">แลกเปลี่ยนตามปกติ</option>
                                            <option value="Inacive">ยกเลิกการแลกเปลี่ยน</option>
                                        </select>
                                        @error('student_status')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">วันที่คาดว่าจะเดินทางถึงไทย</label>
                                        <input type="date" name="arrival_date" class="form-control"/>
                                        @error('arrival_date')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                            </section>


                            <section class="input-group">
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">ชื่ออาจารย์ที่ปรึกษา</label>
                                        <input type="text" name="advisor_fname" class="form-control"/>
                                        @error('advisor_fname')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">นามสกุลอาจารย์ที่ปรึกษา</label>
                                        <input type="text" name="advisor_lname"  class="form-control"/>
                                        @error('advisor_lname')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-item">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Email อาจารย์ที่ปรึกษา</label>
                                        <input type="email" name="advisor_email" class="form-control"  />
                                        @error('advisor_email')
                                            <div class="validate-msg">{{$message}}</div>
                                        @enderror
                                    </div>
                            </section>
                        </div>
                        
                       
                        </div>
                    <div class="overflow-auto">
                        <div class="float-right">
                            <a href="{{ route('student.create') }}" class="bg-slate-300 p-2 pull-right">Previous</a>
                            <button class="p-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit" @disabled($errors->isNotEmpty())>Submit</button>
                        </div>
                      </div>
                </form>


        </div>
    </div>  
    </div>
</x-app-layout>