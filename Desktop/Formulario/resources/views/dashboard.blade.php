<x-app-layout>
    @section('title', 'Minhas Inspeções')

    <h1 class="col-md-6 offset-md-3">Minhas Inspeções</h1>

    <div id="all-form" class="col-md-6 offset-md-3">
    @if ($inspecoes->isNotEmpty())
        @foreach ($inspecoes as $inspecao)
            <div>
                <p><strong>Data de teste:</strong> {{ $inspecao->date }}</p>
                <p><strong>ID Equipamento:</strong> {{ $inspecao->equipamento_id }}</p>
                <p><strong>Equipamento:</strong> {{ $inspecao->equipamento->nome }}</p>
                <p><strong>Status:</strong> {{ $inspecao->apto ? 'Apto' : 'Não Apto' }}</p>
                <p><strong>Observações:</strong> {{ $inspecao->obs ?? 'Nenhuma observação' }}</p>
                <p><strong>Itens inspecionados:</strong>
                    <ul>
                        @foreach (json_decode($inspecao->items) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                <a href="{{ route('inspecoes.edit', $inspecao->id) }}" class="btn btn-primary">Editar</a>

                <hr>
            </div>
        @endforeach
    @else
        <p>Você ainda não fez nenhuma inspeção.</p>
    @endif
</x-app-layout>
