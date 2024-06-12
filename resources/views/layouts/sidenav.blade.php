<!-- resources/views/components/sidenav.blade.php -->
<aside class="w-64 bg-white dark:bg-gray-800 shadow-lg h-screen sidenav">

    <!-- Logo -->
    <div class="shrink-0 flex items-center items-center justify-center">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
    </div>

    <div class="p-6">
        <ul>

            <x-menu-item route="dashboard" name="Inicio" />

            <x-menu-item route="dashboard" name="Incidentes">
                <x-slot name="submenu">
                    <x-menu-item route="reportes" name="Todos los reportes" />
                    <x-menu-item route="dashboard" name="Reportes Pendientes" />
                    <x-menu-item route="dashboard" name="Mis Reportes" />
                </x-slot>
            </x-menu-item>

            <x-menu-item route="dashboard" name="Revisiones">
                <x-slot name="submenu">
                    <x-menu-item route="dashboard" name="Por revisar" />
                    <x-menu-item route="dashboard" name="Revisados" />
                </x-slot>
            </x-menu-item>

            <x-menu-item route="dashboard" name="Empresas">
                <x-slot name="submenu">
                    <x-menu-item route="dashboard" name="Todas las empresas" />
                    <x-menu-item route="dashboard" name="Nueva Empresa" />
                </x-slot>
            </x-menu-item>

            <x-menu-item route="dashboard" name="Usuarios">
                <x-slot name="submenu">
                    <x-menu-item route="dashboard" name="Todas los usuarios" />
                    <x-menu-item route="dashboard" name="Nuevo Usuario" />
                    <x-menu-item route="dashboard" name="Roles y permisos" />
                </x-slot>
            </x-menu-item>

            <x-menu-item route="dashboard" name="Ayuda y Documentación">
                <x-slot name="submenu">
                    <x-menu-item route="dashboard" name="Manuela de Usuario" />
                    <x-menu-item route="dashboard" name="Soporte Técnico" />
                </x-slot>
            </x-menu-item>

            <!-- Add more menu items here -->
        </ul>
    </div>
</aside>
