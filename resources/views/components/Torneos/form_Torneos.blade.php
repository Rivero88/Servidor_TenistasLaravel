<form action="{{$actionUrl}}" method="POST" class="max-w-sm mx-auto">
  @csrf
  @method($method)
  <div class="mb-5">
    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombre</label>
    <input type="text" name="nombre" placeholder="Escribe un nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('nombre', $torneo->nombre) }}" />
    @error('nombre')
    <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>
  
  <div class="mb-5">
    <label for="ciudad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ciudad</label>
    <input type="text" name="ciudad" placeholder="Escribe ciudad" id="ciudad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('ciudad', $torneo->ciudad) }}" />
    @error('ciudad')
      <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>

  <div class="mb-5">
    <label for="superficie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Superficie</label>
    <select name="superficie_id" required>
        <option value="">Selecciona una superficie</option>
        @foreach($superficies as $superficie)
            <option value="{{ $superficie->id }}" {{ old('superficie_id', $torneo->superficie_id) == $superficie->id ? 'selected' : '' }}>
                {{ $superficie->nombre }}
            </option>
        @endforeach
    </select>
    @error('superficie_id')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    @error('superficie')
      <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>  
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{$submitButtonText}}</button>
</form>