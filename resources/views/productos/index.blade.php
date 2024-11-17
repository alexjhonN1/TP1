<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Lista de Productos</h1>
                    
                    <!-- Formulario de búsqueda -->
                    <form action="{{ route('productos.index') }}" method="GET" class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input type="text" name="nombre" id="nombre" value="{{ request('nombre') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                                <select name="categoria" id="categoria" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Todas</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}" 
                                                {{ request('categoria') == $categoria->id_categoria ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="precio_min" class="block text-sm font-medium text-gray-700">Precio Mínimo</label>
                                <input type="number" step="0.01" name="precio_min" id="precio_min" value="{{ request('precio_min') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="precio_max" class="block text-sm font-medium text-gray-700">Precio Máximo</label>
                                <input type="number" step="0.01" name="precio_max" id="precio_max" value="{{ request('precio_max') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Buscar</button>
                        </div>
                    </form>

                    <!-- Listado de productos -->
                    <table class="mt-4 w-full border-collapse border border-gray-300">
                        <!-- Encabezado de la tabla -->
                        <thead>
                            <tr>
                                <th class="border border-gray-300 p-2">Nombre</th>
                                <th class="border border-gray-300 p-2">Descripción</th>
                                <th class="border border-gray-300 p-2">Precio</th>
                                <th class="border border-gray-300 p-2">Stock</th>
                                <th class="border border-gray-300 p-2">Categoría</th>
                                <th class="border border-gray-300 p-2">Acciones</th>
                            </tr>
                        </thead>
                        <!-- Cuerpo de la tabla -->
                        <tbody>
                            @foreach ($productos as $producto)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $producto->nombre }}</td>
                                <td class="border border-gray-300 p-2">{{ $producto->descripcion }}</td>
                                <td class="border border-gray-300 p-2">{{ $producto->precio }}</td>
                                <td class="border border-gray-300 p-2">{{ $producto->stock }}</td>
                                <td class="border border-gray-300 p-2">{{ $producto->categoria->nombre ?? 'Sin Categoría' }}</td>
                                <td class="border border-gray-300 p-2">
                                    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="text-blue-500 hover:underline">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
