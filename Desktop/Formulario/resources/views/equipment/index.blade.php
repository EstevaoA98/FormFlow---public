<x-app-layout>
    @section('title', 'Lista de Equipamentos')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Lista de Equipamentos') }}
        </h2>
    </x-slot>

    <div class="container mt-5">

        <form method="GET" role="filter" action="{{ route('equipment.index') }}" class="d-flex m-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control me-2" placeholder="Buscar equipamento..."
                    style="border-radius: 15px;" value="{{ request('search') }}">
                <button type="submit"
                    class="btn btn-secondary rounded-pill px-3">Buscar</button>
            </div>
        </form>

        <!-- Botões de Filtro -->
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-primary rounded-pill px-3" data-filter="all">Todos</button>
                <button class="btn btn-warning rounded-pill px-3" data-filter="a-vencer">A vencer</button>
                <button class="btn btn-danger rounded-pill px-3" data-filter="vencidos">Vencidos</button>
            </div>
            <a href="{{ route('equipment.hidden') }}" class="btn btn-secondary rounded-pill px-3">
                Recuperar equipamentos
            </a>
        </div>

        <!-- Tabela -->
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
                    <th>Data de Cadastro</th>
                    @auth
                        <th>Ações</th>
                    @endauth

                </tr>
            </thead>
            <tbody>
                @foreach ($equipamentos as $equipamento)
                    <tr class="{{ $equipamento->classeFiltro }}">
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
                                style="color: {{ $equipamento->testeEletricoVencido ? 'red' : ($equipamento->testeEletricoAVencer ? 'orange' : 'black') }};">
                                {{ $equipamento->dataTesteEletrico }}
                            </span>
                        </td>
                        <td>
                            <span
                                style="color: {{ $equipamento->testCalibracaoVencido ? 'red' : ($equipamento->testCalibracaoAVencer ? 'orange' : 'black') }};">
                                {{ $equipamento->dataTesteCalibracao }}
                            </span>
                        </td>
                        <td>{{ $equipamento->created_at->format('d/m/Y') }}</td>
                        @auth
                            <td>
                                <a href="{{ route('equipment.edit', $equipamento->id) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('equipment.destroy', $equipamento->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir este equipamento?')">Excluir</button>
                                </form>
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script para Filtragem -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".filter-btn");
            const rows = document.querySelectorAll("tbody tr");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const filter = this.getAttribute("data-filter");

                    rows.forEach(row => {
                        if (filter === "all") {
                            row.style.display = "";
                        } else if (row.classList.contains(filter)) {
                            row.style.display = "";
                        } else {
                            row.style.display = "none";
                        }
                    });
                });
            });
        });
    </script>

</x-app-layout>
