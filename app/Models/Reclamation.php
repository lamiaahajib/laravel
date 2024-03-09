<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable = ['object', 'description', 'date', 'id_client'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
