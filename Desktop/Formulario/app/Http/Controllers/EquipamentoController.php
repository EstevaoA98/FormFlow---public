<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{

    public function create()
    {
        $equipamentos = Equipamento::all();
        return view('equipment.create', compact('equipamentos'));
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
        return redirect('/')->with('success', 'Equipamento criado com sucesso!');

    }
}
