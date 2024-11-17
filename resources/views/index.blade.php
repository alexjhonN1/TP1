<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Categorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Lista de Categorías</h1>
                    <a href="{{ route('categorias.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Crear Nueva Categoría
                    </a>
                    <ul class="mt-4 space-y-2">
                        @foreach ($categorias as $categoria)
                        <li>
                            {{ $categoria->nombre }}
                            <a href="{{ route('categorias.edit', $categoria->id_categoria) }}" class="text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id_categoria) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
