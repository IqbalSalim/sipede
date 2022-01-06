@props(['active'])

@php
$classes = $active ?? false ? 'inline-flex items-center px-4 py-2  text-sm font-medium leading-5 text-white focus:outline-none focus:border-blue-700 bg-white bg-opacity-30 rounded-lg transition duration-150 ease-in-out' : 'inline-flex items-center px-4 py-2  text-sm font-medium leading-5 text-white hover:bg-white rounded-lg hover:bg-opacity-30 focus:outline-none focus:border-blue-700  transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
