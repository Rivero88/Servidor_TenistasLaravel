<form action="{{$actionUrl}}" method="POST" class="max-w-sm mx-auto">
    @csrf
    <div class="mb-5">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombre</label>
      <input type="text" placeholder="Escribe un nombre" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
        <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Apellidos</label>
        <input type="text" placeholder="Escribe apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
        <label for="mano" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Mano con la que juega</label>
        <input type="text" placeholder="Izquierda o Derecha" id="mano" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
        <label for="altura" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Altura</label>
        <input type="text" placeholder="Escribe altura" id="altura" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
        <label for="nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Año de nacimiento</label>
        <input type="text" placeholder="Escribir año nacimiento" id="nacimiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{$submitButtonText}}</button>
</form>