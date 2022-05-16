@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full p-2 mb-2 border border-indigo-100 rounded-md focus:border-indigo-500']) !!}>
