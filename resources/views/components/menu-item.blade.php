@props(['route' => null, 'name', 'activeRoutes' => []])

@php
    $isActive = $route && request()->routeIs($route);
    if (!$isActive && $activeRoutes) {
        $isActive = collect($activeRoutes)->contains(fn($activeRoute) => request()->routeIs($activeRoute));
    }
@endphp

<li x-data="{ open: {{ $isActive ? 'true' : 'false' }} }">
    @if($route)
        <a href="{{ route($route) }}"
           class="flex items-center px-4 py-3 rounded-lg transition-colors duration-150 ease-in-out group
                  {{ $isActive
                     ? 'bg-gray-300 text-black-700 dark:bg-gray-900 dark:text-gray-200'
                     : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
            <span class="font-medium">{{ $name }}</span>
        </a>
    @else
        <button @click="open = !open"
                class="flex items-center w-full px-4 py-3 rounded-lg transition-colors duration-150 ease-in-out group
                       {{ $isActive
                          ? 'bg-gray-300 text-black-700 dark:bg-gray-900 dark:text-black-200'
                          : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
            <span class="font-medium">{{ $name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200 transform" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    @endif
    @if(isset($submenu))
        <ul x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="mt-1 space-y-1">
            {{ $submenu }}
        </ul>
    @endif
</li>
