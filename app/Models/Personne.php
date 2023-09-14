<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personne extends Model
{
    use HasFactory;
    protected $table = "identification_personnes";


    public function commandeClients(): HasMany
    {
        return $this->hasMany(CommandeClient::class, 'client_id', 'id');
    }

    public function nomComplet()
    {
        return $this->nom." ".$this->prenom;
    }
}
