<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-4">
        <!-- Logo -->
        <a href="/" class="flex items-center">
            <img src="/ruta-del-logo.png" alt="Logo" class="h-10">
            <span class="ml-3 text-2xl font-bold text-blue-600">MiTienda</span>
        </a>

        <!-- Barra de búsqueda -->
        <div class="flex items-center w-1/2">
            <input type="text" placeholder="Buscar productos..." class="w-full border rounded-l-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-r-md">Buscar</button>
        </div>

        <!-- Navegación -->
        <nav class="hidden md:flex space-x-6">
            <a href="#" class="text-gray-600 hover:text-blue-600">Categorías</a>
            <a href="#" class="text-gray-600 hover:text-blue-600">Ofertas</a>
            <a href="#" class="text-gray-600 hover:text-blue-600">Campañas</a>
        </nav>

        <!-- Carrito y cuenta -->
        <div class="flex space-x-4">
            @auth
                <a href="/dashboard" class="text-gray-600 hover:text-blue-600">Mi Cuenta</a>
            @else
                <a href="/login" class="text-gray-600 hover:text-blue-600">Iniciar Sesión</a>
            @endauth
            <a href="/carrito" class="relative text-gray-600 hover:text-blue-600">
                <i class="fas fa-shopping-cart"></i>
                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-2 rounded-full">0</span>
            </a>
        </div>
    </div>
</header>
