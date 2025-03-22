<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Editar Inspeção') }}
        </h2>
    </x-slot>
 
    <br>


    <div id="all-form" class="col-md-6 offset-md-3">
    <form action="{{ route('inspecoes.update', $inspecao->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
        <label for="date">Data:</label>
        <input type="date" name="date" value="{{ $inspecao->date }}" required>
        </div>

        <div>
        <label for="obs">Observações:</label>
        <textarea name="obs">{{ $inspecao->obs }}</textarea>
        </div>

        <div>
        <label for="apto">Status:</label>
        <select name="apto" required>
            <option value="1" {{ $inspecao->apto ? 'selected' : '' }}>Apto</option>
            <option value="0" {{ !$inspecao->apto ? 'selected' : '' }}>Não Apto</option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
    </div>


</x-app-layout>
