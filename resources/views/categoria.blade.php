<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Encabezado -->
    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-center text-2xl">Gestión de Categorías</h1>
    </header>

    <!-- Contenedor principal -->
    <article class="max-w-6xl mx-auto mt-8">
        <!-- Botones de navegación -->
        <section class="flex space-x-4 mb-6">
            <a href="{{ route('home') }}" class="block p-4 bg-blue-500 text-white rounded shadow hover:bg-blue-600 w-full text-center">
                <h2 class="text-xl">Ir a Productos</h2>
            </a>
            <a href="{{ route('proveedor') }}" class="block p-4 bg-green-500 text-white rounded shadow hover:bg-green-600 w-full text-center">
                <h2 class="text-xl">Ir a Proveedores</h2>
            </a>
        </section>

        <!-- Contenedor de las columnas -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 m-6">
            <!-- Formulario -->
            <article class="col-span-1 bg-white p-6 rounded-lg shadow-md mt-6">
                <h3 class="text-xl font-semibold mb-4">Agregar Nueva Categoría</h3>
                <form action="{{ route('add_categoria') }}" method="POST" class="space-y-4">
                    @csrf
                    <label class="block">
                        <span class="text-gray-700">Nombre</span>
                        <input type="text" name="name" placeholder="Nombre de la categoría" class="w-full p-2 border border-gray-300 rounded-md" required>
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Descripción</span>
                        <textarea name="description" placeholder="Descripción de la categoría" class="w-full p-2 border border-gray-300 rounded-md" rows="5"></textarea>
                    </label>
                    <input type="submit" value="Guardar" class="w-full p-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                </form>
            </article>

            <!-- Tabla de categorías -->
            <section class="col-span-2 mt-8">
                <h2 class="text-2xl font-semibold mb-4">Listado de Categorías</h2>
                <table class="min-w-full table-auto border-collapse bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Nombre</th>
                            <th class="px-4 py-2 text-left">Descripción</th>
                            <th class="px-4 py-2 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $categoria->nombre }}</td>
                                <td class="px-4 py-2">{{ $categoria->descripcion }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('mostrar_categoria', $categoria->id_categoria) }}" class="text-blue-500 hover:underline">Editar</a>
                                    <a href="{{ route('eliminar_categoria', $categoria->id_categoria) }}" 
                                        class="text-red-500 hover:underline ml-4" 
                                        onclick="return confirm('¿Estás seguro de eliminar esta categoría?');">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </section>

        <!-- Botón Volver al Dashboard -->
        <div class="text-center">
            <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-gray-500 text-white rounded shadow hover:bg-gray-600">
                Volver al Dashboard
            </a>
        </div>
    </article>

</body>
</html>
