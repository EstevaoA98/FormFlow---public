<x-app-layout>

    @section('title', 'Home')

    @section('content')

        <div id="all-form" class="container-fluid">

            <h1 class="text-center md-3">Todas Inspeções</h1>

            @if ($inspecoes->isNotEmpty())
                <div class="row">
                    @foreach ($inspecoes as $inspecao)
                        <div class="col-md-3">
                            <div class="inspection-card">
                                <p class="page-number">Página {{ $loop->iteration }}</p>
                                <p><strong>Data de teste:</strong> {{ $inspecao->date }}</p>
                                <p><strong>ID Equipamento:</strong> {{ $inspecao->equipamento_id }}</p>
                                <p><strong>Equipamento: </strong> {{ $inspecao->equipamento->nome }}</p>
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
