<x-app-layout>

@section('title', 'Adicionar equipamento')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-black leading-tight">
        {{ __('Adicionar equipamento') }}
    </h2>
</x-slot>

<br>

<div id="create-container" class="form-control" >
<form action="{{ route('equipment.store') }}" method="POST">
    @csrf
    <div class="form-group m-3">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control text-center" id="nome" placeholder="Nome do equipamento" required>
    </div>
    <div class="form-group m-3">
    <label for="descricao">Descrição:</label>
    <textarea name="descricao" class="form-control text-center" id="descricao" placeholder="Descrição / Número de serie"></textarea>
    </div>
    <div class="form-group text-center m-3">
        <button type="submit" class="btn btn-primary mt-4" value="Salvar equipamento">Salvar</button>
    </div>
</form>
</div>
</x-app-layout>
    