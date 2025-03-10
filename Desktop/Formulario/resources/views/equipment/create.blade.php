<form action="{{ route('equipment.store') }}" method="POST">
    @csrf
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>
    <br><br>
    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao"></textarea>
    <br><br>
    <button type="submit">Criar Equipamento</button>
</form>
