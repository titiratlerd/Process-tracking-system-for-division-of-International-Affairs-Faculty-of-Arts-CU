<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-bold text-2xl py-6">Welcome {{ Auth::user()->name }}</h2>
            <div class="bg-white overflow-hidden border border-gray-30 sm:rounded-lg">
                <div class="p-6 text-pink-400 ">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    
    </div>


</x-app-layout>
