<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Encabezado -->
    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-center text-2xl">Gestión de Proveedores</h1>
    </header>
    <article class="max-w-4xl mx-auto mt-8">
        <section class="flex space-x-4">
            <a href="{{route('home')}}" class="block p-4 bg-blue-500 text-white rounded shadow hover:bg-blue-600 w-full text-center">
                <h2 class="text-xl">Ir a Productos</h2>
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
            <form action="{{route('add_proveedor')}}" method="post" class="space-y-4">
                @csrf
                <input type="text" name="nombre" placeholder="Nombre" class="w-full p-2 border border-gray-300 rounded-md" required>
                <input type="text" name="direccion" placeholder="Dirección" class="w-full p-2 border border-gray-300 rounded-md" required>
                <input type="text" name="telefono" placeholder="Teléfono" class="w-full p-2 border border-gray-300 rounded-md" required maxlength="15">
                <input type="email" name="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded-md" required>
                @if ($errors->has('telefono'))
                    <div class="text-red-500 text-sm mt-1">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
                <input type="text" name="contacto" placeholder="Contacto" class="w-full p-2 border border-gray-300 rounded-md" required>
                <textarea name="descripcion" cols="30" rows="10" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Descripción"></textarea>
                <input type="submit" value="Crear Proveedor" class="w-full p-2 bg-green-500 text-white rounded-md hover:bg-green-600">
            </form>
        </article>

        <!-- Tabla de proveedores (ocupa más espacio) -->
        <section class="col-span-2 mt-8">
            <h2 class="text-2xl font-semibold mb-4">Proveedores</h2>
            <table class="min-w-full table-auto border-collapse bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Dirección</th>
                        <th class="px-4 py-2 text-left">Teléfono</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Contacto</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td class="px-4 py-2 border-b">{{$proveedor->nombre}}</td>
                            <td class="px-4 py-2 border-b">{{$proveedor->direccion}}</td>
                            <td class="px-4 py-2 border-b">{{$proveedor->telefono}}</td>
                            <td class="px-4 py-2 border-b">{{$proveedor->email}}</td>
                            <td class="px-4 py-2 border-b">{{$proveedor->contacto}}</td>
                            <td class="px-4 py-2 border-b">{{$proveedor->descripcion}}</td>
                            <td class="px-4 py-2 border-b">
                                <a href="{{route('mostrar_proveedor', $proveedor->id_proveedor)}}" class="text-blue-500 hover:underline">Editar</a>
                            </td>
                            <td class="px-4 py-2 border-b">
                                <a class="text-red-500" href="{{ route('eliminar_proveedor', $proveedor->id_proveedor) }}" onclick="return confirm('¿Estás seguro de eliminar este proveedor?');">Eliminar</a>
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
