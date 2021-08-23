@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-xl shadow-sm border-gray-300 focus:border-blue-300 focus:ring-sm focus:ring-blue-200 focus:ring-opacity-50']) !!}>
