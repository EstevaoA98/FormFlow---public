<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Inspecao;

class Equipamento extends Model
{
    use HasFactory,SoftDeletes; 

    protected $fillable = [
        'nome', 'descricao', 'marca', 'status', 'tipo', 'modelo', 'numero_serie', 'TestEletrico', 'TestCalibracao', 'dataTesteEletrico', 'dataTesteCalibracao', 'deleted_at'
    ];

    public function inspecao()
    {
        return $this->hasMany(Inspecao::class, 'equipamento_id'); // Assume que a chave estrangeira é 'equipamento_id'
    }
    
}
