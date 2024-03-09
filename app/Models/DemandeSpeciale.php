<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeSpeciale extends Model
{
    use HasFactory;
    protected $fillable = ['objet', 'description', 'id_client'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
