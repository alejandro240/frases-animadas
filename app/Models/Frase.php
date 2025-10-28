<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $texto
 * @property string $animacion
 * @property int $user_id
 * @property-read User $user
 */
class Frase extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto',
        'animacion',
        'user_id'
    ];

    /**
     * Get the user that owns the frase.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Frase>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
