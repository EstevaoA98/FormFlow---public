<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function index(Request $request)
    {
        $hoje = Carbon::today();
        $search = trim(strtolower($request->input('search')));

        $equipamentos = Equipamento::query();

        if (!empty($search)) {
            $equipamentos->where(function ($query) use ($search) {
                $query->whereRaw('LOWER(nome) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(descricao) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(marca) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(status) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(tipo) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(modelo) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(numero_serie) LIKE ?', ["%{$search}%"]);
            });
        }

        $equipamentos = $equipamentos->get();

        $equipamentos = $equipamentos->map(function ($equipamento) use ($hoje) {
            $dataTesteEletrico = $equipamento->TestEletrico ? Carbon::parse($equipamento->TestEletrico) : null;
            $dataTesteCalibracao = $equipamento->TestCalibracao ? Carbon::parse($equipamento->TestCalibracao) : null;

            $testeEletricoVencido = $dataTesteEletrico && $dataTesteEletrico->isPast();
            $testCalibracaoVencido = $dataTesteCalibracao && $dataTesteCalibracao->isPast();

            $testeEletricoAVencer = $dataTesteEletrico && !$testeEletricoVencido && $dataTesteEletrico->diffInDays($hoje) <= 30;
            $testCalibracaoAVencer = $dataTesteCalibracao && !$testCalibracaoVencido && $dataTesteCalibracao->diffInDays($hoje) <= 30;

            $classeFiltro = "all";
            if ($testeEletricoVencido || $testCalibracaoVencido) {
                $classeFiltro = "vencidos";
            } elseif ($testeEletricoAVencer || $testCalibracaoAVencer) {
                $classeFiltro = "a-vencer";
            }
            $equipamento->dataTesteEletrico = $dataTesteEletrico ? $dataTesteEletrico->format('d/m/Y') : 'Não informado';
            $equipamento->dataTesteCalibracao = $dataTesteCalibracao ? $dataTesteCalibracao->format('d/m/Y') : 'Não informado';
            $equipamento->testeEletricoVencido = $testeEletricoVencido;
            $equipamento->testCalibracaoVencido = $testCalibracaoVencido;
            $equipamento->testeEletricoAVencer = $testeEletricoAVencer;
            $equipamento->testCalibracaoAVencer = $testCalibracaoAVencer;
            $equipamento->classeFiltro = $classeFiltro;

            return $equipamento;
        });

        return view('equipment.index', compact('equipamentos', 'search'));
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
