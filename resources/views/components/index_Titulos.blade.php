<!-- Listar titulos-->
<x-titulos-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: rgb(224, 170, 88);">
            Listado de Titulos
        </h2>
    </x-slot>  
 <!-- definimos el contenido a renderizar ( no hace falta poner slot )-->
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-g sm:px.20 bg-white border-b border-gray-200">
                <div class="p-4 sm:px-20 bg-white border-b border-gray-200">
                    {{-- Boton para crear un titulo --}}
                    <button class="p-4">
                        <a href="{{ route('components.Titulos.create_Titulos') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium" style="background-color: rgb(224, 170, 88); color: white; border-radius: 0.375rem; transition: background-color 0.3s;">
                            Crear Titulo
                        </a>
                    </button>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase" style="background-color: rgb(224, 170, 88);">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tenista
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Torneo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Año
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
                        @forelse($titulos as $titulo)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <td class="px-6 py-4">
                                {{$titulo->id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$titulo->tenista->nombre}} {{$titulo->tenista->apellidos}}
                            </td>
                            <td class="px-6 py-4">
                                {{$titulo->torneo->nombre}}
                            </td>
                            <td class="px-6 py-4">
                                {{$titulo->anno}}
                            </td>
                            <td class="px-6 py-4">
                                {{$titulo->created_at->format('d/m/Y H:i:s')}}
                            </td>
                            {{-- Botones para editat y eliminar --}}
                            <td class="px-6 py-4">
                                <a href="{{ route('components.Titulos.edit_Titulos', $titulo) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Editar
                                </a>
                                <form action="{{ route('components.Titulos.destroy_Titulos', $titulo) }}" method="POST" 
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar el titulo del año {{$titulo->anno}} de {{$titulo->torneo->nombre}} de {{$titulo->tenista->nombre}} {{$titulo->tenista->apellidos}}?');">
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
                           <td class="px-6 py-4 text-center">
                                No hay títulos.
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="p-4">
                        {{$titulos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="p-4">
        <a href="{{ route('index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium" style="background-color: rgb(224, 170, 88); color: white; border-radius: 0.375rem; transition: background-color 0.3s;">
            Volver al listado
        </a>
    </button>  
</x-titulos-layout>