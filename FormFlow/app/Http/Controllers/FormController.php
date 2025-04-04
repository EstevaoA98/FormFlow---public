<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;  
use App\Models\Inspecao;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
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

        $inspecao = new \App\Models\Inspecao;
        $inspecao->date = $validatedData['date'];
        $inspecao->equipamento_id = $validatedData['equipamento_id'];
        $inspecao->items = json_encode($validatedData['items']);
        $inspecao->apto = $validatedData['apto'];
        $inspecao->obs = $validatedData['obs'];
        $inspecao->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $inspecao->image = $imagePath;
        }

        $inspecao->save();

        return redirect()->route('form.create')->with('success', 'Formulário enviado com sucesso!');
    }

}   
