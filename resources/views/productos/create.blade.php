<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar Nuevo Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Nuevo Producto</h1>

                    <form action="{{ route('productos.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input type="text" id="nombre" name="nombre" required class="mt-1 block w-full" />
                            </div>

                            <div>
                                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                                <textarea id="descripcion" name="descripcion" rows="3" class="mt-1 block w-full"></textarea>
                            </div>

                            <div>
                                <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                                <input type="number" id="precio" name="precio" step="0.01" required class="mt-1 block w-full" />
                            </div>

                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                                <input type="number" id="stock" name="stock" required class="mt-1 block w-full" />
                            </div>

                            <div>
                                <label for="imagen_url" class="block text-sm font-medium text-gray-700">Imagen URL</label>
                                <input type="url" id="imagen_url" name="imagen_url" class="mt-1 block w-full" />
                            </div>

                            <div>
                                <label for="id_categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                                <select id="id_categoria" name="id_categoria" class="mt-1 block w-full">
                                    <option value="">Sin Categoría</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-700">
                                    Agregar Producto
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
