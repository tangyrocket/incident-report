<aside class="no-print fixed pt-6 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-50 dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 overflow-y-auto">
    <div class="px-6 pb-6">
        <div class="flex items-center justify-center mb-6">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="h-10 w-auto" />
            </a>
        </div>

        <!-- Línea separadora -->
        <hr class="my-6 border-gray-200 dark:border-gray-700">

        <nav>
            <ul class="space-y-1">
                <x-menu-item route="dashboard" name="Inicio" />

                <x-menu-item name="Incidentes">
                    <x-slot name="submenu">
                        <x-submenu-item route="reportes" name="Todos los reportes" />
                     
                        <x-submenu-item route="dashboard_reporte" name="Dashboard Reportes" />
                    </x-slot>
                </x-menu-item>

                <x-menu-item name="Revisiones">
                    <x-slot name="submenu">
                        <x-submenu-item route="dashboard" name="Por revisar" />
                        <x-submenu-item route="dashboard" name="Revisados" />
                    </x-slot>
                </x-menu-item>

                <x-menu-item name="Empresas">
                    <x-slot name="submenu">
                        <x-submenu-item route="dashboard" name="Todas las empresas" />
                        <x-submenu-item route="dashboard" name="Nueva Empresa" />
                    </x-slot>
                </x-menu-item>
            </ul>
        </nav>
    </div>
</aside>
