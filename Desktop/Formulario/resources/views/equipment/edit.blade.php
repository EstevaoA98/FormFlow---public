<x-app-layout>
    @section('title', 'Editar Equipamento')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Editar Equipamento') }}
        </h2>
    </x-slot>

    <div id="create-container" class="col-md-6 offset-md-3">
        <form action="{{ route('equipment.update', $equipamento->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group m-3">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control rounded" id="nome" placeholder="Nome do equipamento" value="{{ old('nome', $equipamento->nome) }}" required>
            </div>
            <div class="form-group m-3">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="form-control rounded" id="descricao" placeholder="Descrição / Número de série">{{ old('descricao', $equipamento->descricao ?? '') }}</textarea>
            </div>
            <div class="form-group m-3">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" class="form-control rounded" id="marca" placeholder="Marca do equipamento" value="{{ old('tipo', $equipamento->marca) }}" required>
            </div>
            <div class="form-group m-3">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control rounded">
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <div class="form-group m-3">
                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" class="form-control rounded" id="tipo" placeholder="Tipo do equipamento" value="{{ old('tipo', $equipamento->tipo) }}" required>
            </div>
            <div class="form-group m-3">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" class="form-control rounded" id="modelo" placeholder="Modelo do equipamento" value="{{ old('tipo', $equipamento->modelo) }}" required>
            </div>
            <div class="form-group m-3">
                <label for="numero_serie">Número de Série:</label>
                <input type="text" name="numero_serie" class="form-control rounded" id="numero_serie" placeholder="Número de Série do equipamento" value="{{ old('tipo', $equipamento->numero_serie) }}" required>
            </div>
            <div class="form-group m-3">
                <label for="TestEletrico">Data de vencimento do teste Elétrico:</label>
                <input type="date" name="TestEletrico" class="form-control rounded" id="TestEletrico" value="{{ old('tipo', $equipamento->TestEletrico) }}" required>
            </div>
            <div class="form-group m-3">
                <label for="TestCalibracao">Data de vencimento do teste de Calibração:</label>
                <input type="date" name="TestCalibracao" class="form-control rounded" id="TestCalibracao" value="{{ old('tipo', $equipamento->TestCalibracao) }}" required>
            </div>

            <div class="form-group m-3">

            <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
        </form>
    </div>

</x-app-layout>
