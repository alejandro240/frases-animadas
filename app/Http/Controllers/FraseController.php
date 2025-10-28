<?php

namespace App\Http\Controllers;

use App\Models\Frase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;

#[\Illuminate\Auth\Middleware\Authenticate]
/**
 * @method User user()
 */
class FraseController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, DispatchesJobs;

    /**
     * @var array<string, string>
     */
    private array $tiposAnimacion = [
        'matrix' => '🟢 Matrix Digital Rain - Efecto Matriz',
        'quantum' => '⚛️ Quantum Glitch - Distorsión Cuántica',
        'nebula' => '🌌 Cosmic Nebula - Explosión Cósmica',
        'hologram' => '🔷 Holographic Scan - Holograma Futurista',
        'particle' => '✨ Particle Explosion - Explosión de Partículas'
    ];

    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        
        return view('frases.index', [
            'frases' => $user->frases()->latest()->get(),
            'tiposAnimacion' => $this->tiposAnimacion
        ]);
    }

    public function create()
    {
        return view('frases.create', [
            'tiposAnimacion' => $this->tiposAnimacion
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'texto' => 'required|max:255',
            'animacion' => 'required|in:matrix,quantum,nebula,hologram,particle'
        ]);

        /** @var User $user */
        $user = Auth::user();
        $frase = $user->frases()->create($validated);
        
        return redirect()
            ->route('frases.show', $frase)
            ->with('success', 'Frase creada exitosamente.');
    }

    public function show(Frase $frase)
    {
        $this->authorize('view', $frase);
        return view('frases.show', [
            'frase' => $frase,
            'puedeCrearNueva' => true
        ]);
    }

    public function destroy(Frase $frase)
    {
        $this->authorize('delete', $frase);
        $frase->delete();
        
        return redirect()
            ->route('frases.index')
            ->with('success', 'Frase eliminada exitosamente.');
    }
}
