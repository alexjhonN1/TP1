<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Bienvenido al Dashboard, {{ Auth::user()->name }}</h1>

                    <!-- Enlaces a funcionalidades -->
                    <div class="mt-4 space-y-4">
                        <a href="{{ route('categorias.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                            Gestión de Categorías
                        </a>
                        <a href="{{ route('productos.index') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">
                            Gestión de Productos
                        </a>
                    </div>

                    <!-- Cerrar sesión -->
                    <div class="mt-6">
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                           class="text-red-500 hover:underline">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
