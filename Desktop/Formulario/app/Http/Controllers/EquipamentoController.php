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
            'marca' => 'nullable|string',
            'modelo' => 'nullable|string',
            'numero_serie' => 'nullable|string',
            'TestEletrico' => 'nullable|string',
            'TestCalibracao' => 'nullable|string',
        ]);

        Equipamento::create([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'numero_serie' => $request->input('numero_serie'),
            'TestEletrico' => $request->input('TestEletrico'),
            'TestCalibracao' => $request->input('TestCalibracao'),
        ]);

        return redirect('/')->with('success', 'Equipamento criado com sucesso!');

    }

    public function index()
    {
        $equipamentos = Equipamento::all(); 
        return view('equipment.index', compact('equipamentos'));
    }

    public function edit($id)
    {
        $equipamento = Equipamento::findOrFail($id); 
        return view('equipment.edit', compact('equipamento'));
    }

    public function update(Request $request, $id)
    {
        $equipamento = Equipamento::findOrFail($id);

        $equipamento->update([
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'status' => $request->status,
            'descricao' => $request->descricao,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'numero_serie' => $request->numero_serie,
            'TestEletrico' => $request->TestEletrico,
            'TestCalibracao' => $request->TestCalibracao,
        ]);

        return redirect()->route('equipment.index')->with('success', 'Equipamento atualizado com sucesso!');
    }
}
