<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    
    public function create()
    {
        return view('equipment.create'); 
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        // Criação de um novo equipamento no banco
        Equipamento::create([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
        ]);

        // Redireciona para uma página com uma mensagem de sucesso
        return redirect()->route('equipment.create')->with('success', 'Equipamento criado com sucesso!');
    }
}
