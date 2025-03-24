<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Equipamentos Recuperáveis') }}
        </h2>
    </x-slot>
    
    @foreach ($equipamentos as $equipamento)
        <div>
            <p>{{ $equipamento->nome }}</p>
            <p>{{ $equipamento->descricao }}</p>

            <form action="{{ route('equipment.restore', $equipamento->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">Recuperar</button>
            </form>

            <form action="{{ route('equipment.forceDelete', $equipamento->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir permanentemente</button>
            </form>
        </div>
    @endforeach
</x-app-layout>