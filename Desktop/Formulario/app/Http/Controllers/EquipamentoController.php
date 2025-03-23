<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'marca' => 'nullable|string|max:255',
            'status' => 'required|string',
            'tipo' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'numero_serie' => 'nullable|string|max:255',
            'TestEletrico' => 'nullable|date',
            'TestCalibracao' => 'nullable|date',
        ]);

        $equipamento = new Equipamento();
        $equipamento->nome = $request->nome;
        $equipamento->descricao = $request->descricao;
        $equipamento->marca = $request->marca;
        $equipamento->status = $request->status;
        $equipamento->tipo = $request->tipo;
        $equipamento->modelo = $request->modelo;
        $equipamento->numero_serie = $request->numero_serie;
        $equipamento->TestEletrico = $request->TestEletrico;
        $equipamento->TestCalibracao = $request->TestCalibracao;
        $equipamento->save();

        return redirect()->route('equipment.index')->with('success', 'Equipamento criado com sucesso!');
    }


    public function index()
    {
        $equipamentos = Equipamento::all();

        foreach ($equipamentos as $equipamento) { // Verifica se os testes está vencendo (dentro de 7 dias)

            $equipamento->testeletrico_vencendo = $this->isVencendo($equipamento->TestEletrico);

            $equipamento->testcalibracao_vencendo = $this->isVencendo($equipamento->TestCalibracao);
        }

        return view('equipment.index', compact('equipamentos'));
    }

    private function isVencendo($data)
    {
        $data_vencimento = Carbon::parse($data); 
        $hoje = Carbon::now(); 

        return $data_vencimento->isBefore($hoje) || $data_vencimento->diffInDays($hoje) <= 7;
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
