<!-- Listar torneos-->
<x-torneos-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: rgb(104, 160, 206);">
            Listado de Torneos
        </h2>
    </x-slot>  
 <!-- definimos el contenido a renderizar ( no hace falta poner slot )-->
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-g sm:px.20 bg-white border-b border-gray-200">
                <div class="p-4 sm:px-20 bg-white border-b border-gray-200">
                    {{-- Boton para crear torneo --}}
                    <button class="p-4">
                        <a href="{{ route('components.Torneos.create_Torneos') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium" style="background-color: rgb(104, 160, 206); color: white; border-radius: 0.375rem; transition: background-color 0.3s;">
                            Crear Torneos
                        </a>
                    </button>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase" style="background-color: rgb(104, 160, 206);">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ciudad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Superficie
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
                        @forelse($torneos as $torneo)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <td class="px-6 py-4">
                                {{$torneo->id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$torneo->nombre}}
                            </td>
                            
                            <td class="px-6 py-4">
                                {{$torneo->ciudad}}
                            </td>
                            <td class="px-6 py-4">
                                {{$torneo->superficies->nombre}}
                            </td>
                            <td class="px-6 py-4">
                                {{$torneo->created_at->format('d/m/Y H:i:s')}}
                            </td>
                            {{-- Botones para editar y eliminar --}}
                            <td class="px-6 py-4">
                                <a href="{{ route('components.Torneos.edit_Torneos', $torneo) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Editar
                                </a>
                                    <form action="{{ route('components.Torneos.destroy_Torneos', $torneo) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar el torneo {{$torneo->nombre}}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center">
                                No hay torneos.
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="p-4">
                        {{$torneos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="p-4">
        <a href="{{ route('index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium" style="background-color: rgb(104, 160, 206); color: white; border-radius: 0.375rem; transition: background-color 0.3s;">
            Volver al listado
        </a>
    </button>  
</x-torneos-layout>