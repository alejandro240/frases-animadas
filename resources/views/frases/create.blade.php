<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
                    Crear Nueva Animación
                </h2>

                <form action="{{ route('frases.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="texto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Texto a Animar
                        </label>
                        <input type="text" name="texto" id="texto" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                               placeholder="Escribe una letra, palabra o frase...">
                        @error('texto')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="animacion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tipo de Animación
                        </label>
                        <select name="animacion" id="animacion" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Selecciona un tipo de animación</option>
                            @foreach($tiposAnimacion as $valor => $nombre)
                                <option value="{{ $valor }}">{{ $nombre }}</option>
                            @endforeach
                        </select>
                        @error('animacion')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" 
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Crear Animación
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>