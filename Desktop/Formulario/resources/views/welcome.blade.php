@extends('tamplates.head')

@section('title', 'Home')

@section('content')

<div id="all-form" class="col-md-6 offset-md-3">
    <h1 class="text-center md-3">Inspeções</h1>
    <div id="all-form" class="col-md-6 offset-md-3">
    @if ($inspecoes->isNotEmpty())
        @foreach ($inspecoes as $inspecao)
            <div>
                <p class="page-number">Página {{ $loop->iteration }}</p>
                <p><strong>Data de teste:</strong> {{ $inspecao->date }}</p>
                <p><strong>ID Equipamento:</strong> {{ $inspecao->equipamento_id }}</p>
                <p><strong>Equipamento: </strong> {{ $inspecao->equipamento->nome }}</p>
                <p><strong>Status: </strong> {{ $inspecao->apto ? 'Apto' : 'Não Apto' }}</p>
                <p><strong>Observações: </strong>{{ $inspecao->obs ?? 'Nenhuma observação' }}</p>
                <p><strong>Itens inspecionados: </strong>
                    <ul>
                        @foreach (json_decode($inspecao->items) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </p>
                <p><strong>Imagem do equipamento: </strong>
                    <br>
                    @if($inspecao->image)
                    <img src="{{ asset('storage/' . $inspecao->image) }}" alt="Imagem da inspeção" width="300" height="200">
                    @else
                        <p>Nenhuma imagem disponível</p>
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
