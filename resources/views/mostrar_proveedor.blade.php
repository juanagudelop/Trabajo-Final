<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <section class="flex items-center justify-center min-h-screen">
        <article class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Editar Proveedor</h1>
            <form action="{{ route('editar_proveedor', $proveedor->id_proveedor) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="nombre" class="block text-gray-700">Nombre (único)</label>
                    <input 
                        type="text" 
                        id="nombre"
                        name="nombre" 
                        value="{{ $proveedor->nombre }}" 
                        placeholder="Nombre del proveedor" 
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 placeholder-gray-500" 
                        maxlength="50"
                        required
                    >
                </div>

                <div class="space-y-2">
                    <label for="direccion" class="block text-gray-700">Dirección</label>
                    <input 
                        type="text" 
                        id="direccion"
                        name="direccion" 
                        value="{{ $proveedor->direccion }}" 
                        placeholder="Dirección del proveedor" 
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 placeholder-gray-500" 
                        maxlength="50"
                        required
                    >
                </div>

                <div class="space-y-2">
                    <label for="telefono" class="block text-gray-700">Teléfono (único)</label>
                    <input 
                        type="text" 
                        id="telefono"
                        name="telefono" 
                        value="{{ $proveedor->telefono }}" 
                        placeholder="Teléfono del proveedor" 
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 placeholder-gray-500" 
                        maxlength="15"
                        required>
                </div>

                <div class="space-y-2">
                    <label for="email" class="block text-gray-700">Correo electrónico (único)</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        value="{{ $proveedor->email }}" 
                        placeholder="Correo electrónico del proveedor" 
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 placeholder-gray-500" 
                        maxlength="100"
                        required
                    >
                </div>

                <div class="space-y-2">
                    <label for="contacto" class="block text-gray-700">Nombre del contacto</label>
                    <input 
                        type="text" 
                        id="contacto"
                        name="contacto" 
                        value="{{ $proveedor->contacto }}" 
                        placeholder="Nombre del contacto principal" 
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 placeholder-gray-500" 
                        maxlength="30"
                        required
                    >
                </div>

                <div class="space-y-2">
                    <label for="descripcion" class="block text-gray-700">Descripción (opcional)</label>
                    <input 
                        type="text" 
                        id="descripcion"
                        name="descripcion" 
                        value="{{ $proveedor->descripcion }}" 
                        placeholder="Descripción del proveedor" 
                        class="w-full px-4 py-3 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 placeholder-gray-500" 
                        maxlength="150"
                    >
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('proveedor') }}" 
                        class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancelar</a>
                    <button type="submit" 
                        class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Guardar Cambios</button>
                </div>
            </form>
        </article>
    </section>

</body>
</html>
