<!-- Listar tenistas-->
<x-tenistas-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: rgb(105, 163, 107);">
            Listado de Tenistas
        </h2>
    </x-slot>
     <!-- definimos el contenido a renderizar ( no hace falta poner slot )-->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-g sm:px.20 bg-white border-b border-gray-200">
                    <div class="p-4 sm:px-20 bg-white border-b border-gray-200">
                        <button class="p-4">
                            <a href="{{ route('components.Tenistas.create_Tenistas') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium" style="background-color: rgb(105, 163, 107); color: white; border-radius: 0.375rem; transition: background-color 0.3s;">
                                Crear Tenista
                            </a>
                        </button>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase" style="background-color: rgb(105, 163, 107);">
                                <tr>
                                    <th scope="col" class="px-6 py-3" hidden>
                                        id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Apellidos
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Altura
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Año de nacimiento
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Mano con la que juega
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Títulos
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Creada en fecha
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tenistas as $tenista)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                        <td class="px-6 py-4" hidden>
                                            {{$tenista->id}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$tenista->nombre}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$tenista->apellidos}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$tenista->altura}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$tenista->anno_nacimiento}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$tenista->mano}}
                                        </td>
                                        {{-- Muestra los titulos de un tenista --}}
                                        <td class="px-6 py-4">
                                            <a href="{{ route('components.Tenistas.index_Tenistas-Titulos', ['tenista_id' => $tenista->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                {{ $tenista->titulos()->count() }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$tenista->created_at->format('d/m/Y H:i:s')}}
                                        </td>
                                        {{-- Botones para editar y eliminar --}}
                                        <td class="px-6 py-4">
                                            <a href="{{route('components.Tenistas.edit_Tenistas', $tenista)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                Editar
                                            </a>
                                            <form action="{{route('components.Tenistas.destroy_Tenistas', $tenista)}}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar el tenista {{$tenista->nombre}} {{$tenista->apellidos}}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 text-center">
                                            No hay tenistas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-4">
                            {{$tenistas->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <button>
            <a href="{{route('index')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium" style="background-color: rgb(105, 163, 107); color: white; border-radius: 0.375rem; transition: background-color 0.3s;">
                Volver al listado
            </a>
        </button>
    </div>
</x-tenistas-layout>
