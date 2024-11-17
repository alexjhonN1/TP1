<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Productos Destacados</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($productos as $producto)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800">{{ $producto->nombre }}</h3>
                        <p class="text-blue-600 font-bold mt-4">S/ {{ number_format($producto->precio, 2) }}</p>
                        <a href="#" class="block mt-4 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-500">Añadir al Carrito</a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No hay productos disponibles.</p>
            @endforelse
        </div>
    </div>
</section>
