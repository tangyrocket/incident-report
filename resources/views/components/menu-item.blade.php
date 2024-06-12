<!-- resources/views/components/menu-item.blade.php -->
<li class="mt-2 ">
    <a href="{{ route($route)}}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
        {{ $name }}
    </a>
    @if (isset($submenu))
        <ul class="pl-4">
            {{ $submenu }}
        </ul>
    @endif
</li>

<!--
{{ request()->routeIs($route) ? 'sidenav-selected' : 'sidenav-no-selected' }}
-->
