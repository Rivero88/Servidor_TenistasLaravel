<!-- para llamar a los componentes dentro de views/components-->
<x-tenistas-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl leading-tight" style="color: rgb(105, 163, 107);">
          Titulos ganados por {{$tenista->nombre}} {{$tenista->apellidos}}
      </h2>
  </x-slot>
   <!-- definimos el contenido a renderizar ( no hace falta poner slot )-->
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="p-g sm:px.20 bg-white border-b border-gray-200">
                  <div class="p-4 sm:px-20 bg-white border-b border-gray-200">
                      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                          <thead class="text-xs text-gray-700 uppercase" style="background-color: rgb(105, 163, 107);">
                              <tr>
                                  <th scope="col" class="px-6 py-3">
                                      Tenista
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Id del torneo
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Torneo
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Año
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse($titulos as $titulo)
                                  <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                      <td class="px-6 py-4">
                                        {{$titulo->tenista->nombre}} {{$titulo->tenista->apellidos}}
                                      </td>
                                      <td class="px-6 py-4">
                                        {{$titulo->torneo->id}}
                                      </td>
                                      <td class="px-6 py-4">
                                        {{$titulo->torneo->nombre}}
                                      </td>
                                      <td class="px-6 py-4">
                                        {{$titulo->anno}}
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
                  </div>
              </div>
          </div>
      </div>
      
      <button>
          <a href="{{route('components.index_Tenistas')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium" style="background-color: rgb(105, 163, 107); color: white; border-radius: 0.375rem; transition: background-color 0.3s;">
              Volver al listado
          </a>
      </button>
  </div>
</x-tenistas-layout>