@props(['active'])

@php
$classes = $active ?? false ? 'block pl-3 pr-4 py-2 border-l-4 border-blue-800 text-base font-medium text-white bg-white bg-opacity-50 focus:outline-none focus:text-blue-800 focus:bg-white focus:border-blue-700 transition duration-150 ease-in-out' : 'block pl-3 pr-4 py-2  text-base font-medium text-white  focus:outline-none focus:text-blue-800 focus:bg-white  transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
