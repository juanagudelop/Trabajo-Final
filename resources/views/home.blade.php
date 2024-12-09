<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Encabezado -->
    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-center text-2xl">Gestión de Productos</h1>
    </header>
    <!-- Contenedor para los botones -->
    <article class="max-w-4xl mx-auto mt-8">
        <section class="flex space-x-4">
            <a href="{{route('proveedor')}}" class="block p-4 bg-green-500 text-white rounded shadow hover:bg-blue-600 w-full text-center">
                <h2 class="text-xl">Ir a Proveedores</h2>
            </a>
            <a href="{{route('categoria')}}" class="block p-4 bg-blue-500 text-white rounded shadow hover:bg-blue-600 w-full text-center">
                <h2 class="text-xl">Ir a Categorias</h2>
            </a>
        </section>
    </article>

    <!-- Contenedor de las columnas -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 m-6">
        <!-- Formulario -->
        <article class="col-span-1 bg-white p-6 rounded-lg shadow-md mt-6">
            <form action="{{ route('add_product') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="nombre" placeholder="Nombre del producto" required class="w-full p-2 border border-gray-300 rounded-md">
                <input type="number" name="precio" placeholder="Precio del producto" required class="w-full p-2 border border-gray-300 rounded-md">
                <input type="number" name="stock" placeholder="Cantidad" required class="w-full p-2 border border-gray-300 rounded-md">
                <select name="fk_id_categoria" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Select Category</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id_categoria}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
                <select name="fk_id_proveedor" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Select Proveedor</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id_proveedor}}">{{$proveedor->nombre}}</option>
                    @endforeach
                </select>
                <button type="submit" class="w-full p-2 bg-green-500 text-white rounded-md hover:bg-green-600">Agregar</button>
            </form>
        </article>

        <!-- Tabla de productos (ocupa más espacio) -->
        <section class="col-span-2 mt-8">
            <h2 class="text-2xl font-semibold mb-4">Productos</h2>
            <table class="min-w-full table-auto border-collapse bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Producto</th>
                        <th class="px-4 py-2 text-left">Precio</th>
                        <th class="px-4 py-2 text-left">Stock</th>
                        <th class="px-4 py-2 text-left">Categoria</th>
                        <th class="px-4 py-2 text-left">Proveedor</th>
                        <th class="px-4 py-2 text-left">Fecha de Creación</th>
                        <th class="px-4 py-2 text-left" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="px-4 py-2 border-b">{{$producto->id_producto}}</td>
                            <td class="px-4 py-2 border-b">{{$producto->nombre}}</td>
                            <td class="px-4 py-2 border-b">{{$producto->precio}}</td>
                            <td class="px-4 py-2 border-b">{{$producto->stock}}</td>
                            <td class="px-4 py-2 border-b">{{$producto->categoria->nombre}}</td>
                            <td class="px-4 py-2 border-b">{{$producto->proveedor->nombre}}</td>
                            <td class="px-4 py-2 border-b">{{$producto->created_at->format('y-m-d H:i:s')}}</td>
                            <td class="px-4 py-2 border-b">
                                <a href="{{route('mostrar_producto', $producto->id_producto)}}" class="text-blue-500 hover:underline">Editar</a>
                            </td>
                            <td class="px-4 py-2 border-b">
                                <a href="{{route('eliminar_producto', $producto->id_producto)}}" class="text-red-500 hover:underline">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <!-- Botón Volver al Dashboard -->
        <div class="text-center">
            <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-gray-500 text-white rounded shadow hover:bg-gray-600">
                Volver al Dashboard
            </a>
        </div>
    </section>

</body>
</html>
