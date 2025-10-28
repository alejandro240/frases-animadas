<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-6">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-white mb-4">✨ Frases Animadas</h1>
            <p class="text-gray-400 mb-8">Crea increíbles animaciones de texto</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Botón para crear nueva animación -->
            <a href="{{ route('frases.create') }}" 
               class="group relative overflow-hidden rounded-xl border-2 border-purple-500 bg-gradient-to-br from-purple-600 to-blue-600 p-8 transition-all hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/50">
                <div class="text-center">
                    <div class="text-6xl mb-4">➕</div>
                    <h3 class="text-2xl font-bold text-white mb-2">Nueva Animación</h3>
                    <p class="text-purple-100">Crea una nueva frase animada</p>
                </div>
            </a>

            <!-- Botón para ver todas las animaciones -->
            <a href="{{ route('frases.index') }}" 
               class="group relative overflow-hidden rounded-xl border-2 border-blue-500 bg-gradient-to-br from-blue-600 to-cyan-600 p-8 transition-all hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/50">
                <div class="text-center">
                    <div class="text-6xl mb-4">📋</div>
                    <h3 class="text-2xl font-bold text-white mb-2">Mis Animaciones</h3>
                    <p class="text-blue-100">Ver todas tus creaciones</p>
                </div>
            </a>

            <!-- Estadísticas rápidas -->
            <a href="{{ route('frases.index') }}" 
               class="group relative overflow-hidden rounded-xl border-2 border-green-500 bg-gradient-to-br from-green-600 to-emerald-600 p-8 transition-all hover:scale-105 hover:shadow-2xl hover:shadow-green-500/50">
                <div class="text-center">
                    <div class="text-6xl mb-4">📊</div>
                    <h3 class="text-2xl font-bold text-white mb-2">Estadísticas</h3>
                    <p class="text-green-100">Ve tus números</p>
                </div>
            </a>
        </div>

        <!-- Sección de tipos de animaciones -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-white mb-4">🎨 Tipos de Animaciones Disponibles</h2>
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-5">
                <div class="rounded-lg border border-green-500/30 bg-green-500/10 p-4">
                    <div class="text-3xl mb-2">🟢</div>
                    <h4 class="font-bold text-green-400">Matrix</h4>
                    <p class="text-xs text-gray-400">Efecto Matriz</p>
                </div>
                <div class="rounded-lg border border-cyan-500/30 bg-cyan-500/10 p-4">
                    <div class="text-3xl mb-2">⚛️</div>
                    <h4 class="font-bold text-cyan-400">Quantum</h4>
                    <p class="text-xs text-gray-400">Distorsión Cuántica</p>
                </div>
                <div class="rounded-lg border border-purple-500/30 bg-purple-500/10 p-4">
                    <div class="text-3xl mb-2">🌌</div>
                    <h4 class="font-bold text-purple-400">Nebula</h4>
                    <p class="text-xs text-gray-400">Explosión Cósmica</p>
                </div>
                <div class="rounded-lg border border-blue-500/30 bg-blue-500/10 p-4">
                    <div class="text-3xl mb-2">🔷</div>
                    <h4 class="font-bold text-blue-400">Hologram</h4>
                    <p class="text-xs text-gray-400">Holograma Futurista</p>
                </div>
                <div class="rounded-lg border border-yellow-500/30 bg-yellow-500/10 p-4">
                    <div class="text-3xl mb-2">✨</div>
                    <h4 class="font-bold text-yellow-400">Particle</h4>
                    <p class="text-xs text-gray-400">Explosión de Partículas</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
