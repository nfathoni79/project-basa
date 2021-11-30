@props(['bg' => 'indigo'])

@php
    $class = 'w-full sm:w-auto inline-flex justify-center rounded-md border shadow-sm px-4 py-2 text-base sm:text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3';

    if ($bg != 'white') {
        $class .= ' border-transparent bg-'.$bg.'-600 text-white hover:bg-'.$bg.'-700 focus:ring-'.$bg.'-500';
    } else {
        $class .= ' border-gray-300 bg-white text-base hover:bg-gray-50 focus:ring-indigo-500';
    }
@endphp

<button {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</button>
