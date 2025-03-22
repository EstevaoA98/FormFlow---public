<x-app-layout>

    @section('title', 'Formulário de inspeção')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Formulário de inspeção de equipamento') }}
        </h2>
    </x-slot>

    <br>

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group m-3">
                <label for="date">Data do teste: </label>
                <input type="date" class="form-control" id="date" name="date"
                    value="{{ now()->format('Y-m-d') }}" readonly
                    style="background: transparent; border: none; outline: none; box-shadow: none;">
            </div>
            <div class="form-group m-3">
                <div class="form-group m-3">
                    <label for="equipamento_id">Equipamento:</label>
                    <select class="form-control" id="equipamento_id" name="equipamento_id">
                        <option value="">Selecione um equipamento</option>
                        @if ($equipamentos && $equipamentos->count() > 0)
                            @foreach ($equipamentos as $equipamento)
                                <option value="{{ $equipamento->id }}">{{ $equipamento->nome }}</option>
                            @endforeach
                        @else
                            <option value="">Nenhum equipamento encontrado</option>
                        @endif
                    </select>
                    <div class="form-group m-3">
                        <label for="description">Infraestrutura do Evento:</label><br>
                        @if ($errors->has('items'))
                            <p class="alert alert-danger">
                                <ion-icon name="alert-circle"></ion-icon> {{ $errors->first('items') }}
                            </p>
                        @endif
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Botões"
                                {{ in_array('Botões', old('items', [])) ? 'checked' : '' }}> Botões
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Display"
                                {{ in_array('Display', old('items', [])) ? 'checked' : '' }}> Display
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Cabo de força"
                                {{ in_array('Cabo de força', old('items', [])) ? 'checked' : '' }}> Cabo de força
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Pedal"
                                {{ in_array('Pedal', old('items', [])) ? 'checked' : '' }}> Pedal
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Micro-motor"
                                {{ in_array('Micro-motor', old('items', [])) ? 'checked' : '' }}> Micro-motor
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Drill"
                                {{ in_array('Drill', old('items', [])) ? 'checked' : '' }}> Drill
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Serra"
                                {{ in_array('Serra', old('items', [])) ? 'checked' : '' }}> Serra
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Conexão"
                                {{ in_array('Conexão', old('items', [])) ? 'checked' : '' }}> Conexão
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Ruido anormal"
                                {{ in_array('Ruido anormal', old('items', [])) ? 'checked' : '' }}> Ruido anormal
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Aumento de temperatura"
                                {{ in_array('Aumento de temperatura', old('items', [])) ? 'checked' : '' }}> Aumento de
                            temperatura
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Problemas na conexão"
                                {{ in_array('Problemas na conexão', old('items', [])) ? 'checked' : '' }}> Problemas na
                            conexão
                        </div>
                    </div>
                    <div class="form-group m-3">
                        <label for="apto">Equipamento apto pra uso?</label>
                        <select class="form-select" id="apto" name="apto" aria-label="Disabled select example">
                            <option value="0" {{ old('apto') == '0' ? 'selected' : '' }}>Não</option>
                            <option value="1" {{ old('apto') == '1' ? 'selected' : '' }}>Sim</option>
                        </select>
                    </div>
                    <div class="form-group m-3">
                        <label for="location">Observação:</label>
                        <textarea class="form-control" id="obs" name="obs" placeholder="Observação a ser pontuada...">{{ old('obs') }}</textarea>
                    </div>
                    <div class="form-group m-3">
                        <label for="image">Foto ou video do equipamento:</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if ($errors->has('image'))
                            <p class="alert alert-danger">
                                <ion-icon name="alert-circle"></ion-icon> {{ $errors->first('image') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group text-center m-3">
                        <button type="submit" class="btn btn-custom" value="Criar evento">Criar Evento</button>
                    </div>
        </form>
    </div>

</x-app-layout>
