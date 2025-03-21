<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspecao;
use App\Models\Equipamento;
use Illuminate\Support\Facades\Auth;

class InspecaoController extends Controller
{
    public function create()
    {
        $equipamentos = Equipamento::all();

        return view('form', compact('equipamentos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'equipamento_id' => 'required|exists:equipamentos,id',
            'items' => 'nullable|array',
            'apto' => 'required|boolean',
            'obs' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $inspecao = new Inspecao();
        $inspecao->date = $validatedData['date'];
        $inspecao->equipamento_id = $validatedData['equipamento_id'];
        $inspecao->items = json_encode($validatedData['items'] ?? []);
        $inspecao->apto = $validatedData['apto'];
        $inspecao->obs = $validatedData['obs'] ?? null;
        $inspecao->user_id = Auth::id();

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('images', 'public');

            $inspecao->image = $imagePath;
        }
        $inspecao->save();

        return redirect()->route('inspecoes.index')->with('success', 'Inspeção registrada com sucesso!');
    }


    public function home()
    {
        $inspecoes = Inspecao::all();

        // Gerar o HTML ou conteúdo de exibição diretamente no controlador
        $inspecoesHtml = '';
        foreach ($inspecoes as $inspecao) {
            $inspecoesHtml .= "
                <div>
                    <h3>Data: {$inspecao->date}</h3>
                    <p>Equipamento: {$inspecao->equipamento->nome}</p>
                    <p>Status: " . ($inspecao->apto ? 'Apto' : 'Não Apto') . "</p>
                    <p>Observações: " . ($inspecao->obs ?: 'Nenhuma') . "</p>
                </div>
            ";
        }

        return view('home', compact('inspecoesHtml'));
    }

    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            
            $inspecoes = Inspecao::whereHas('equipamento', function ($q) use ($query) {
                $q->where('nome', 'like', '%' . $query . '%');
            })->get();
        } else {
            $inspecoes = Inspecao::all();
        }

        return view('welcome', compact('inspecoes'));
    }

    public function show($id)
    {
        $inspecao = Inspecao::find($id);

        return view('show', compact('inspecao'));
    }

}
