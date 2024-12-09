<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>

    <!-- Contenedor de las columnas -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 m-6">
        <!-- Formulario -->
        <article class="col-span-1 bg-white p-6 rounded-lg shadow-md mt-6">
            <h3 class="text-xl font-semibold mb-4">Agregar Nueva Categoría</h3>
            <form action="{{ route('createCategory') }}" method="POST" class="space-y-4">
                @csrf
                <label class="block">
                    <span class="text-gray-700 dark:text-gray-300">Nombre</span>
                    <input type="text" name="name" placeholder="Nombre de la categoría" class="w-full p-2 border border-gray-300 rounded-md" required>
                </label>
                <label class="block">
                    <span class="text-gray-700 dark:text-gray-300">Descripción</span>
                    <textarea name="description" placeholder="Descripción de la categoría" class="w-full p-2 border border-gray-300 rounded-md" rows="5"></textarea>
                </label>
                <input type="submit" value="Guardar" class="w-full p-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
            </form>
        </article>

        <!-- Tabla de categorías (ocupa más espacio) -->
        <section class="col-span-2 mt-8 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Listado de Categorías</h2>
            <table class="min-w-full table-auto border-collapse bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $category->name }}</td>
                            <td class="px-4 py-2">{{ $category->description }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('showCategory', $category->id) }}" class="text-blue-500 hover:underline">Editar</a>
                                <a href="{{ route('deleteCategory', $category->id) }}" 
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
</x-app-layout>
