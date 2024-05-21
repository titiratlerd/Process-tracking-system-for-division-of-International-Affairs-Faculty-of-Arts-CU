<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- imported font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased overflow-hidden">
        <div class="bg-gray-50 flex h-full flex-row">
                @include('layouts.navigation')
            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white shadow flex">
                    <div class="max-w-7xl mx-auto py-6 px-2 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>

                    <div class="">
                        <form method="get" action="{{ route('inbound.progress_tracking.edit') }}">
                            <label for="semester">ภาคเรียน</label>
                            <select id="semester" name="semester">
                            </select>
                            
                            <label for="year">ปีการศึกษา</label>
                            <select id="year" name="year">
                        </select>
                        
                        <button class="bg-pink-400 text-white px-4 py-2 rounded-lg" type="submit">ค้นหา</button>
                        </form>
                    
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main class="overflow-auto">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
