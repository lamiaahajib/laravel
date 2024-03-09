<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisPassage extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'nom_site', 'statut', 'autorisation', 'id_client'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
