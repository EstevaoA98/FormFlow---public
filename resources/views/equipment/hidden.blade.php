<x-app-layout> 
    @section('title', 'Equipamentos Recuperáveis')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Equipamentos Recuperáveis') }}
        </h2>
        <form method="GET" role="filter" action="{{ route('equipment.index') }}" class="d-flex m-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control me-2" placeholder="Buscar equipamento..."
                    style="border-radius: 15px;" value="{{ request('search') }}">
                <button type="submit"
                    class="btn btn-secondary rounded-pill px-3">Buscar</button>
            </div>
        </form>
    </x-slot>

    <a href="{{ url('equipment') }}" class="btn btn-secondary mt-3" style="position: static; margin-left: 30px;"> ← </a>
    
    <div class="container mt-3">

        <table class="table table-bordered table-striped rounded mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Marca</th>
                    <th>Tipo</th>
                    <th>Modelo</th>
                    <th>Número de Série</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipamentos as $equipamento)
                    <div>
                        <tr>
                            <td>{{ $equipamento->id }}</td>
                            <td>{{ $equipamento->nome }}</td>
                            <td>{{ $equipamento->descricao }}</td>
                            <td>{{ $equipamento->marca }}</td>
                            <td>{{ $equipamento->tipo }}</td>
                            <td>{{ $equipamento->modelo }}</td>
                            <td>{{ $equipamento->numero_serie }}</td>
                            <td>{{ $equipamento->created_at->format('d/m/Y') }}</td>


                            <td style="display: flex; gap: 5px; justify-content: center; align-items: center;">
                                <form action="{{ route('equipment.restore', $equipamento->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success rounded-pill px-3">Recuperar</button>
                                </form>
                                <form action="{{ route('equipment.forceDelete', $equipamento->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-pill px-3">Excluir permanentemente</button>
                                </form>
                            </td>
                        </tr>
                        </form>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
