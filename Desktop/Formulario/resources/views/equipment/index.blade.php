<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome do Equipamento</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipamentos as $equipamento)
                    <tr>
                        <td>{{ $equipamento->id }}</td>
                        <td>{{ $equipamento->nome }}</td>
                        <td>{{ $equipamento->tipo }}</td>
                        <td>{{ $equipamento->status }}</td>
                        <td>{{ $equipamento->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('equipment.edit', $equipamento->id) }}" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
