<h1>Editar Producto</h1>
<form action="{{ route('productos.update', $producto->id_producto) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ $producto->nombre }}" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion">{{ $producto->descripcion }}</textarea>

    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" value="{{ $producto->stock }}" required>

    <label for="id_categoria">Categoría:</label>
    <select name="id_categoria">
        <option value="">Sin Categoría</option>
        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id_categoria }}" {{ $producto->id_categoria == $categoria->id_categoria ? 'selected' : '' }}>
            {{ $categoria->nombre }}
        </option>
        @endforeach
    </select>

    <label for="imagen_url">URL de la Imagen:</label>
    <input type="url" name="imagen_url" value="{{ $producto->imagen_url }}">

    <button type="submit">Actualizar</button>
</form>
