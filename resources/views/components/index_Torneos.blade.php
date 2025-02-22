<!-- para llamar a los componentes dentro de views/components-->
<x-torneos-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Listado de Torneos
        </h2>
    </x-slot>  
 <!-- definimos el contenido a renderizar ( no hace falta poner slot )-->
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-g sm:px.20 bg-white border-b border-gray-200">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <button class="p-4">
                        <a href="{{ route('components.Torneos.create_Torneos') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium bg-black text-white rounded-md hover:bg-gray-800">
                            Crear Torneos
                        </a>
                    </button>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
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
                           <td class="px-6 py-4 whitespace-nowrap">
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
</x-torneos-layout>