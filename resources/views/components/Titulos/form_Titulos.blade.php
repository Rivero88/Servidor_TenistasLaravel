<form action="{{$actionUrl}}" method="POST" class="max-w-sm mx-auto">
  @csrf
  @method($method)
  <div class="mb-5">
    <label for="anno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Año</label>
    <input type="number" name="anno" placeholder="Escribe un año" id="anno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('anno', $titulo->anno) }}" />
    @error('anno')
    <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>
  
  <div class="mb-5">
    <label for="tenista" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tenista</label>
    <select name="tenista_id" required>
        <option value="">Selecciona un tenista</option>
        @foreach($tenistas as $tenista)
            <option value="{{ $tenista->id }}" {{ old('tenista_id', $titulo->tenista_id) == $tenista->id ? 'selected' : '' }}>
                {{ $tenista->nombre }} {{ $tenista->apellidos }}
            </option>
        @endforeach
    </select>
    @error('tenista_id')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    @error('tenista')
      <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>  
  
  <div class="mb-5">
    <label for="torneo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Torneo</label>
    <select name="torneo_id" required>
        <option value="">Selecciona un torneo</option>
        @foreach($torneos as $torneo)
            <option value="{{ $torneo->id }}" {{ old('torneo_id', $titulo->torneo_id) == $torneo->id ? 'selected' : '' }}>
                {{ $torneo->nombre }}
            </option>
        @endforeach
    </select>
    @error('torneo_id')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    @error('torneo')
      <span class="text-red-500 text-sm"> {{$message}}</span>
    @enderror
  </div>  
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{$submitButtonText}}</button>
</form>