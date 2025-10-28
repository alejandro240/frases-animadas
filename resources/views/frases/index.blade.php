<x-layouts.app>
    <div class="py-8">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-5xl font-bold text-white mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Frases Animadas
            </h1>
            <p class="text-gray-400 text-lg mb-6">
                Selecciona una animación de la lista o crea una nueva
            </p>
            <a href="{{ route('frases.create') }}" class="inline-block bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:scale-105 shadow-lg">
                ➕ Nueva Animación
            </a>
        </div>

        @if($frases->isEmpty())
            <div class="text-center py-16">
                <div class="text-6xl mb-4">📝</div>
                <p class="text-gray-400 text-xl mb-2">No tienes animaciones aún</p>
                <p class="text-gray-500">¡Crea tu primera animación espectacular!</p>
            </div>
        @else
            <!-- Estadísticas -->
            <div class="mb-8 bg-zinc-800/50 border border-zinc-700 rounded-xl p-6">
                <h3 class="text-white text-xl font-bold mb-4">📊 Estadísticas</h3>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <div class="bg-cyan-500/10 border border-cyan-500/30 rounded-lg p-4 text-center">
                        <div class="text-cyan-400 text-3xl font-bold">{{ $frases->count() }}</div>
                        <div class="text-gray-400 text-sm">Total</div>
                    </div>
                    <div class="bg-green-500/10 border border-green-500/30 rounded-lg p-4 text-center">
                        <div class="text-green-400 text-3xl font-bold">{{ $frases->where('animacion', 'matrix')->count() }}</div>
                        <div class="text-gray-400 text-sm">Matrix</div>
                    </div>
                    <div class="bg-cyan-500/10 border border-cyan-500/30 rounded-lg p-4 text-center">
                        <div class="text-cyan-400 text-3xl font-bold">{{ $frases->where('animacion', 'quantum')->count() }}</div>
                        <div class="text-gray-400 text-sm">Quantum</div>
                    </div>
                    <div class="bg-purple-500/10 border border-purple-500/30 rounded-lg p-4 text-center">
                        <div class="text-purple-400 text-3xl font-bold">{{ $frases->where('animacion', 'nebula')->count() }}</div>
                        <div class="text-gray-400 text-sm">Nebula</div>
                    </div>
                    <div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-4 text-center">
                        <div class="text-blue-400 text-3xl font-bold">{{ $frases->where('animacion', 'hologram')->count() }}</div>
                        <div class="text-gray-400 text-sm">Hologram</div>
                    </div>
                </div>
            </div>

            <!-- Grid de animaciones -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($frases as $frase)
                <div class="bg-zinc-800/50 border border-zinc-700 rounded-xl p-6 hover:border-purple-500/50 hover:shadow-lg hover:shadow-purple-500/20 transition-all">
                    <div class="mb-4">
                        <h3 class="text-white text-xl font-bold mb-2">{{ Str::limit($frase->texto, 40) }}</h3>
                        <p class="text-gray-400 text-sm">{{ $tiposAnimacion[$frase->animacion] ?? $frase->animacion }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('frases.show', $frase) }}" class="flex-1 text-center bg-cyan-500/20 hover:bg-cyan-500/30 text-cyan-400 font-semibold py-2 px-4 rounded-lg border border-cyan-500/50 transition-all">
                            👁️ Ver
                        </a>
                        <form method="POST" action="{{ route('frases.destroy', $frase) }}" class="flex-1" onsubmit="return confirm('¿Eliminar esta animación?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-500/20 hover:bg-red-500/30 text-red-400 font-semibold py-2 px-4 rounded-lg border border-red-500/50 transition-all">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.app>