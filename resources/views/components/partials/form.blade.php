<form action="{{$actionUrl}}" method="POST" class="max-w-sm mx-auto">
  @csrf
  @method($method)
  <div class="mb-5">
    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombre</label>
    <input type="text" name="nombre" placeholder="Escribe un nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('nombre') }}" />
    @error('nombre')
    <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>
  
  <div class="mb-5">
    <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Apellidos</label>
    <input type="text" name="apellidos" placeholder="Escribe apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('apellidos') }}" />
    @error('apellidos')
      <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>
  
  <div class="mb-5">
    <label for="mano" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Mano con la que juega</label>
    <input type="text" name="mano" placeholder="zurdo o diestro" id="mano" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('mano') }}" />
    @error('mano')
      <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>
  
  <div class="mb-5">
    <label for="altura" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Altura</label>
    <input type="text" name="altura" placeholder="Escribe altura" id="altura" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('altura') }}" />
    @error('altura')
      <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>
  
  <div class="mb-5">
    <label for="anno_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Año de nacimiento</label>
    <input type="text" name="anno_nacimiento" placeholder="Escribir año nacimiento" id="anno_nacimiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('anno_nacimiento') }}" />
    @error('anno_nacimiento')
      <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>
  
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{$submitButtonText}}</button>
</form>