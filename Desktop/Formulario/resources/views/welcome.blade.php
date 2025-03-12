@extends('tamplates.head')

@section('title', 'Home')

@section('content')
    <h1 class="text-center">Inspeções</h1>
    <div id="all-form" class="col-md-6 offset-md-3">
    @if ($inspecoes->isNotEmpty())
        @foreach ($inspecoes as $inspecao)
            <div>
                <p>Data: {{ $inspecao->date }}</p>
                <p>Equipamento ID: {{ $inspecao->equipamento_id }}</p>
                <p>Equipamento: {{ $inspecao->equipamento->nome }}</p>
                <p>Status: {{ $inspecao->apto ? 'Apto' : 'Não Apto' }}</p>
                <p>Observações: {{ $inspecao->obs ?? 'Nenhuma observação' }}</p>
                <p>Itens inspecionados: 
                    <ul>
                        @foreach (json_decode($inspecao->items) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </p>
                <p>Imagem:
                    @if($inspecao->image)
                        <img src="{{ asset('storage/' . $inspecao->image) }}" alt="Imagem da inspeção" />
                    @else
                        Nenhuma imagem disponível
                    @endif
                </p>
            </div>
            <hr>
        @endforeach
    @else
        <p>Nenhuma inspeção encontrada.</p>
    @endif
    </div>
@endsection
