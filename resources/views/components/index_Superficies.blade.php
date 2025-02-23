<!-- Listar superficies-->
<x-superficies-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: rgb(228, 117, 109);">
            Listado de Superficies
        </h2>
    </x-slot> 
    <!-- definimos el contenido a renderizar ( no hace falta poner slot )--> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-g sm:px.20 bg-white border-b border-gray-200">
                    <div class="p-4 sm:px-20 bg-white border-b border-gray-200">
                    <button class="p-4">
                        {{-- Boton para crear superficie --}}
                        <a href="{{ route('components.Superficies.create_Superficies') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium" style="background-color: rgb(228, 117, 109); color: white; border-radius: 0.375rem; transition: background-color 0.3s;">
                            Crear Superficie
                        </a>
                    </button>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase" style="background-color: rgb(228, 117, 109);">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
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
                        @forelse($superficies as $superficie)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <td class="px-6 py-4">
                                {{$superficie->id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$superficie->nombre}}
                            </td>
                            <td class="px-6 py-4">
                                {{$superficie->created_at->format('d/m/Y H:i:s')}}
                            </td>
                            {{-- Boton para eliminar superficie --}}
                            <td class="px-6 py-4">
                                <form action="{{ route('components.Superficies.destroy_Superficies', $superficie) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar la superficie {{$superficie->nombre}}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center">
                                No hay superficies.
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="p-4">
                        {{$superficies->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="p-4">
        <a href="{{ route('index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium" style="background-color: rgb(228, 117, 109); color: white; border-radius: 0.375rem; transition: background-color 0.3s;">
            Volver al listado
        </a>
    </button> 
</x-superficies-layout>
