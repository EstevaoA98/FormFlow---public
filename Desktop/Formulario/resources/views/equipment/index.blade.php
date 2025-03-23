<x-app-layout>
    @section('title', 'Lista de Equipamentos')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Lista de Equipamentos') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <table class="table table-bordered table-striped rounded">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Marca</th>
                    <th>Status</th>
                    <th>Tipo</th>
                    <th>Modelo</th>
                    <th>Número de Série</th>
                    <th>Teste Elétrico</th>
                    <th>Teste de Calibração</th>
                    <th>Data de cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipamentos as $equipamento)
                    <tr>
                        <td>{{ $equipamento->id }}</td>
                        <td>{{ $equipamento->nome }}</td>
                        <td>{{ $equipamento->descricao }}</td>
                        <td>{{ $equipamento->marca }}</td>
                        <td>{{ $equipamento->status ? 'Ativo' : 'Inativo' }}</td>
                        <td>{{ $equipamento->tipo }}</td>
                        <td>{{ $equipamento->modelo }}</td>
                        <td>{{ $equipamento->numero_serie }}</td>
                        <td>
                                    <span 
                                        @php
                                            $testeEletricoVencido = \Carbon\Carbon::parse($equipamento->TestEletrico)->isPast();
                                        @endphp
                                        style="color: {{ $testeEletricoVencido ? 'red' : 'black' }};"
                                    >
                                        {{ $equipamento->TestEletrico ? \Carbon\Carbon::parse($equipamento->TestEletrico)->format('d/m/Y') : 'Não informado' }}
                                    </span>
                            </td>
                        <td>
                                    <span 
                                        @php
                                            $testCalibracaoVencido = \Carbon\Carbon::parse($equipamento->TestCalibracao)->isPast();
                                        @endphp
                                        style="color: {{ $testCalibracaoVencido ? 'red' : 'black' }};"
                                    >
                                        {{ $equipamento->TestCalibracao ? \Carbon\Carbon::parse($equipamento->TestCalibracao)->format('d/m/Y') : 'Não informado' }}
                                    </span>
                        </td>
                        <td>{{ $equipamento->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('equipment.edit', $equipamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('equipment.destroy', $equipamento->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este equipamento?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
