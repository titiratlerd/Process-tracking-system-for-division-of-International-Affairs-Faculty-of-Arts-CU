<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inbound Student Data') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <h1> This is Inbound data</h1>

    @if($message = Session::get('success'))
        <div class="alert">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table-auto border-spacing-x-44 border-collapse">
        <tr>
            <th>รหัสนิสิต</th>
            <th>ชื่อ-นามสกุล</th>
            <th>มหาวิทยาลัย</th>
            <th>สัญชาติ</th>
            <th>หลักสูตร</th>
            <th>Student Process</th>
            <th>Action</th>
            <th>ดูรายละเอียด</th>
        </tr>
        {{-- @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->firstname}}</td>
                <td>{{$student->university->university_name}}</td>
                <td>{{$student->nationality}}</td>
                <td>{{$student->exchange_program}}</td>
                <td>
                    <a class="bg-yellow-300" href="{{route('student.edit', ['student' => $student])}}">See detail</a>
                </td>
                <td>
                    <form method="POST" action="{{route('product.destroy', ['product' => $student])}}">
                        @csrf 
                        @method('delete')
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
            <td>{{$student->exchange_program}}</td>

        @endforeach --}}
    </table>
    
        </div>
    </div>
</div>
</x-app-layout>