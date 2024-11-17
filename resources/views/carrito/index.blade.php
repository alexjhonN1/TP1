<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Carrito de Compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Carrito de Compras</h1>
                    
                    @if ($productos->isEmpty())
                        <p>No tienes productos en tu carrito.</p>
                    @else
                        <table class="mt-4 w-full border-collapse border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="border border-gray-300 p-2">Producto</th>
                                    <th class="border border-gray-300 p-2">Precio Unitario</th>
                                    <th class="border border-gray-300 p-2">Cantidad</th>
                                    <th class="border border-gray-300 p-2">Subtotal</th>
                                    <th class="border border-gray-300 p-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td class="border border-gray-300 p-2">{{ $producto->nombre }}</td>
                                    <td class="border border-gray-300 p-2">${{ $producto->pivot->precio_unitario }}</td>
                                    <td class="border border-gray-300 p-2">{{ $producto->pivot->cantidad }}</td>
                                    <td class="border border-gray-300 p-2">
                                        ${{ $producto->pivot->precio_unitario * $producto->pivot->cantidad }}
                                    </td>
                                    <td class="border border-gray-300 p-2">
                                        <form action="{{ route('carrito.update', $producto->id_producto) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="cantidad" value="{{ $producto->pivot->cantidad }}" min="1" class="w-16">
                                            <button type="submit" class="text-blue-500 hover:underline">Actualizar</button>
                                        </form>
                                        <form action="{{ route('carrito.remove', $producto->id_producto) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
