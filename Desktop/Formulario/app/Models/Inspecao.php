<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspecao extends Model
{
    use HasFactory;

    protected $table = 'inspecoes';
    protected $fillable = ['date', 'equipamento_id', 'items', 'apto', 'obs', 'image'];

    protected $casts = [
        'items' => 'array',
        'apto' => 'boolean',
        'date' => 'date',
    ];

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
