<x-app-layout>
    @include('partials.header') <!-- Cabecera -->
    @include('partials.banner') <!-- Banner -->
    @include('partials.products', ['productos' => $productos]) <!-- Productos -->
    @include('partials.footer') <!-- Pie de página -->
</x-app-layout>
