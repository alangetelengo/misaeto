<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandeClient extends Model
{
    use HasFactory;

    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'id');
    }
    
    public function client(): BelongsTo
    {
        return $this->belongsTo(Personne::class, 'client_id', 'id');
    }

}
