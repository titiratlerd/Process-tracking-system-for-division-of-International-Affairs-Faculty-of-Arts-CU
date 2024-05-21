@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex justify-start w-full py-2 pl-2 text-pink-300 transition duration-75 rounded-lg m-1 group hover:border hover:border-pink-30 dark:text-white dark:hover:bg-gray-700'
            : 'flex justify-start w-full py-2 pl-2 text-gray-50 transition duration-75 rounded-lg m-1 group hover:border hover:border-pink-30 dark:text-white dark:hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>


{{-- border-b-2 border-indigo-400
inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-pink-300 focus:outline-none focus:border-pink-700 transition duration-150 ease-in-out --}}