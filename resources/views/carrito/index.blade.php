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
                    <h1 class="text-2xl font-bold mb-4">Carrito de Compras</h1>

                    @if ($productos->isEmpty())
                        <p class="text-center text-gray-600">No tienes productos en tu carrito.</p>
                    @else
                        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-100 border-b">
                                        <th class="p-4 text-left text-sm font-medium text-gray-900">Producto</th>
                                        <th class="p-4 text-left text-sm font-medium text-gray-900">Precio Unitario</th>
                                        <th class="p-4 text-left text-sm font-medium text-gray-900">Cantidad</th>
                                        <th class="p-4 text-left text-sm font-medium text-gray-900">Subtotal</th>
                                        <th class="p-4 text-left text-sm font-medium text-gray-900">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-4 text-sm font-medium text-gray-900">{{ $producto->nombre }}</td>
                                        <td class="p-4 text-sm font-medium text-gray-900">${{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                                        <td class="p-4 text-sm text-gray-900">
                                            <form action="{{ route('carrito.update', $producto->id_producto) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" name="cantidad" value="{{ $producto->pivot->cantidad }}" min="1" class="w-16 p-2 border border-gray-300 rounded-md">
                                                <button type="submit" class="text-blue-500 hover:underline ml-2">Actualizar</button>
                                            </form>
                                        </td>
                                        <td class="p-4 text-sm font-medium text-gray-900">
                                            ${{ number_format($producto->pivot->precio_unitario * $producto->pivot->cantidad, 2) }}
                                        </td>
                                        <td class="p-4">
                                            <form action="{{ route('carrito.remove', $producto->id_producto) }}" method="POST" class="inline-block">
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

                        <div class="mt-6 flex justify-end">
                            <p class="font-semibold text-lg">
                                Total: ${{ number_format($productos->sum(function ($producto) {
                                    return $producto->pivot->precio_unitario * $producto->pivot->cantidad;
                                }), 2) }}
                            </p>
                        </div>

                        <div class="mt-6 flex justify-between">
                            <a href="{{ route('productos.index') }}" class="bg-gray-800 text-white py-2 px-6 rounded-md hover:bg-gray-700">
                                Seguir Comprando
                            </a>
                            <a href="{{ route('checkout') }}" class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-500">
                                Proceder al Pago
                            </a>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
