<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <section class="flex items-center justify-center min-h-screen">
        <article class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Detalles del Producto</h1>
            <form action="{{ route('editar_producto', $producto->id_producto) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="nombre" class="block text-gray-700">Nombre del Producto</label>
                    <input 
                        type="text" 
                        id="nombre"
                        name="nombre"
                        value="{{ $producto->nombre }}" 
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 placeholder-gray-500">
                </div>

                <div class="space-y-2">
                    <label for="precio" class="block text-gray-700">Precio</label>
                    <input 
                        type="number" 
                        id="precio"
                        name="precio"
                        value="{{ $producto->precio }}" 
                        step="0.01"
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 placeholder-gray-500">
                </div>

                <div class="space-y-2">
                    <label for="stock" class="block text-gray-700">Stock</label>
                    <input 
                        type="number" 
                        id="stock"
                        name="stock"
                        value="{{ $producto->stock }}" 
                        min="0"
                        step="1"
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 placeholder-gray-500">
                </div>

                <!-- Select de Categoría -->
                <div class="space-y-2">
                    <label for="categoria" class="block text-gray-700">Categoría</label>
                    <select 
                        name="fk_id_categoria" 
                        id="categoria" 
                        class="w-full p-2 border border-gray-300 rounded-md">
                        <option value="">Seleccione Categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id_categoria }}" 
                                {{ $categoria->id_categoria == $producto->fk_id_categoria ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Select de Proveedor -->
                <div class="space-y-2">
                    <label for="proveedor" class="block text-gray-700">Proveedor</label>
                    <select 
                        name="fk_id_proveedor" 
                        id="proveedor" 
                        class="w-full p-2 border border-gray-300 rounded-md">
                        <option value="">Seleccione Proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_proveedor }}" 
                                {{ $proveedor->id_proveedor == $producto->fk_id_proveedor ? 'selected' : '' }}>
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('home') }}" 
                        class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Volver</a>
                    <button type="submit"class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Editar Producto</button>
                </div>
            </form>
        </article>
    </section>

</body>
</html>
