<x-app-layout>

    @section('title', 'Home')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Todas Inspeções') }}
        </h2>

        <form class="d-flex m-3" role="search" action="{{ route('inspecoes.index') }}" method="GET">
            <input class="form-control me-2" type="search" name="query" placeholder="Equipamento"
                aria-label="Equipamento" style="border-radius: 15px;">
            <button class="btn btn-secondary rounded-pill px-3" type="submit">Buscar</button>
        </form>

    </x-slot>

    <br>

    <div id="all-form" class="container-fluid">
        @if ($inspecoes->isNotEmpty())
            <div class="row">
                @foreach ($inspecoes as $inspecao)
                    <div class="col-md-3">
                        <div class="inspection-card">
                            <p class="page-number">Página {{ $loop->iteration }}</p>
                            <p><strong>Equipamento: </strong> {{ $inspecao->equipamento->nome }}</p>
                            <p><strong>ID Equipamento:</strong> {{ $inspecao->equipamento_id }}</p>
                            <p><strong>Data de teste:</strong> {{ $inspecao->date->format('d/m/Y') }}</p>
                            <p><strong>Observações: </strong>{{ $inspecao->obs ?? 'Nenhuma observação' }}</p>
                            <p><strong>Itens inspecionados: </strong>
                            <ul>
                                @foreach (json_decode($inspecao->items) as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                            </p>
                            <p><strong>Inspecionado por:</strong> {{ $inspecao->usuario->name ?? 'Desconhecido' }}</p>
                            <p><strong>Última atualização:</strong>
                                {{ $inspecao->updated_at->gt($inspecao->created_at) ? $inspecao->updated_at->format('d/m/Y H:i') : 'N/A' }}
                            </p>
                            <p><strong>Observações: </strong>{{ $inspecao->obs ?? 'Nenhuma observação' }}</p>
                            <p><strong>Status: </strong> {{ $inspecao->apto ? 'Apto' : 'Não Apto' }}</p>

                            <div class="inspection-image">
                                <strong>Imagem do equipamento:</strong>
                                @if ($inspecao->image)
                                    <img src="{{ asset('storage/' . $inspecao->image) }}" alt="Imagem da inspeção"
                                        width="300" height="200">
                                @else
                                    <p>Nenhuma imagem disponível</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Nenhuma inspeção encontrada.</p>
        @endif
    </div>

</x-app-layout>
