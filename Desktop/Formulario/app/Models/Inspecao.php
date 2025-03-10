<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspecao extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'equipamento_id', 'items', 'apto', 'obs', 'image'];

    protected $casts = [
        'items' => 'array',
        'apto' => 'boolean',
    ];
}

