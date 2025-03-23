<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Editar Equipamento') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <form action="{{ route('equipment.update', $equipamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome do Equipamento</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $equipamento->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo', $equipamento->tipo) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="ativo" {{ old('status', $equipamento->status) == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ old('status', $equipamento->status) == 'inativo' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
        </form>
    </div>
</x-app-layout>
