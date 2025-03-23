<x-app-layout>
    @section('title', 'Adicionar equipamento')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Adicionar equipamento') }}
        </h2>
    </x-slot>

    <br>

    <div id="create-container" class="col-md-6 offset-md-3">
        <form action="{{ route('equipment.store') }}" method="POST">
            @csrf
            <div class="form-group m-3">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control rounded" id="nome" placeholder="Nome do equipamento" required>
            </div>
            <div class="form-group m-3">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="form-control rounded" id="descricao" placeholder="Descrição / Número de série"></textarea>
            </div>
            <div class="form-group m-3">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" class="form-control rounded" id="marca" placeholder="Marca do equipamento">
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
                <input type="text" name="tipo" class="form-control rounded" id="tipo" placeholder="Tipo do equipamento">
            </div>
            <div class="form-group m-3">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" class="form-control rounded" id="modelo" placeholder="Modelo do equipamento">
            </div>
            <div class="form-group m-3">
                <label for="numero_serie">Número de Série:</label>
                <input type="text" name="numero_serie" class="form-control rounded" id="numero_serie" placeholder="Número de Série do equipamento">
            </div>
            <div class="form-group m-3">
                <label for="TestEletrico">Data de vencimento do teste Elétrico:</label>
                <input type="date" name="TestEletrico" class="form-control rounded" id="TestEletrico">
            </div>
            <div class="form-group m-3">
                <label for="TestCalibracao">Data de vencimento do teste de Calibração:</label>
                <input type="date" name="TestCalibracao" class="form-control rounded" id="TestCalibracao">
            </div>

            <div class="form-group m-3">
                <button type="submit" class="btn btn-primary mt-4">Salvar</button>
            </div>
        </form>
    </div>
</x-app-layout>
