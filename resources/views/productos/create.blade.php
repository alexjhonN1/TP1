<h1>Crear Producto</h1>
<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion"></textarea>

    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" required>

    <label for="id_categoria">Categoría:</label>
    <select name="id_categoria">
        <option value="">Sin Categoría</option>
        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>

    <label for="imagen_url">URL de la Imagen:</label>
    <input type="url" name="imagen_url">

    <button type="submit">Guardar</button>
</form>
