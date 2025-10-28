<x-layout>
    <div class="py-16">
        <div class="max-w-md mx-auto">
            <div class="bg-white shadow-xl rounded-lg p-8">
                <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Animador de Frases</h1>
                <form action="{{ route('frases.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="texto" class="block text-sm font-medium text-gray-700 mb-1">
                            Introduce tu letra, palabra o frase para animarla
                        </label>
                        <input type="text" 
                               name="texto" 
                               id="texto" 
                               placeholder="Escribe aquí..." 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                               required>
                    </div>
                    <button type="submit" 
                            class="w-full bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition duration-150 font-medium">
                        Animar frase
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
