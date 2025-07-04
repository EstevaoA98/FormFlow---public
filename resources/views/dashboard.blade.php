<x-app-layout>
    @section('title', 'Minhas Inspeções')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Minhas Inspeções') }}
        </h2>
    </x-slot>

    <br>
        
    <div id="all-form" class="col-md-6 offset-md-3">
        @if ($inspecoes->isNotEmpty())
            @foreach ($inspecoes as $inspecao)
                <div class="form-control mt-3">
                    <p><strong>Data de teste:</strong> {{ $inspecao->date->format('d/m/Y') }}</p>
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
                    <br>
                    <p><strong>Última atualização:</strong>
                        {{ $inspecao->updated_at->gt($inspecao->created_at) ? $inspecao->updated_at->format('d/m/Y') : 'N/A' }}
                    </p>
                    <p><strong>Observações: </strong>{{ $inspecao->obs ?? 'Nenhuma observação' }}</p>
                    <p><strong>Status: </strong> {{ $inspecao->apto ? 'Apto' : 'Não Apto' }}</p>

                    </div>
                    <div class="d-flex gap-2 mt-3 justify-content-center">
                        <a href="{{ route('inspecoes.edit', $inspecao->id) }}" class="btn btn-primary">Editar</a>
                    
                        <form action="{{ route('inspecoes.destroy', $inspecao->id) }}" method="POST"
                            onsubmit="return confirm('Tem certeza que deseja excluir esta inspeção?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>Você ainda não fez nenhuma inspeção.</p>
        @endif
    </div>

</x-app-layout>
