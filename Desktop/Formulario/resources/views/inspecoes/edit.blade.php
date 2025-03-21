<x-app-layout>
    <h1>Editar Inspeção</h1>

    <form action="{{ route('inspecoes.update', $inspecao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="date">Data:</label>
        <input type="date" name="date" value="{{ $inspecao->date }}" required>

        <label for="obs">Observações:</label>
        <textarea name="obs">{{ $inspecao->obs }}</textarea>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

</x-app-layout>
