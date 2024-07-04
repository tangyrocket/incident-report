@props(['route', 'name'])

@php
    $isActive = request()->routeIs($route);
@endphp

<li>
    <a href="{{ route($route) }}"
       class="flex items-center pl-11 pr-4 py-2 text-sm rounded-lg transition-colors duration-150 ease-in-out
              {{ $isActive
                 ? 'bg-gray-300 text-black-700 dark:bg-indigo-900 dark:text-gray-200'
                 : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
        {{ $name }}
    </a>
</li>
