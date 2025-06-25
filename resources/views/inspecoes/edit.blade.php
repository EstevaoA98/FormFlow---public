<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Editar Inspeção') }}
        </h2>
    </x-slot>

    <br>

    <div id="all-form" class="form-control">
        <form action="{{ route('inspecoes.update', $inspecao->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="date">Data de modificação:</label>
                <input type="date" class="form-control" id="date" name="date"
                    value="{{ now()->format('Y-m-d') }}" readonly
                    style="background: transparent; border: none; outline: none; box-shadow: none;">
            </div>

            <div class="form-group">
                <label for="obs">Observações:</label>
                <textarea class="form-control" id="obs" name="obs" placeholder="Observação...">{{ old('obs', $inspecao->obs) }}</textarea>
            </div>

            <div class="form-group m-3">
                <label for="description">Itens inspecionados:</label><br>

                @if ($errors->has('items'))
                    <p class="alert alert-danger">
                        <ion-icon name="alert-circle"></ion-icon> {{ $errors->first('items') }}
                    </p>
                @endif

                @php
                    $selectedItems = is_array($inspecao->items)
                        ? $inspecao->items
                        : json_decode($inspecao->items, true);
                @endphp

                @foreach (['Botões', 'Display', 'Cabo de força', 'Pedal', 'Micro-motor', 'Drill', 'Serra', 'Conexão', 'Ruido anormal', 'Aumento de temperatura', 'Problemas na conexão'] as $item)
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="{{ $item }}"
                            {{ in_array($item, $selectedItems ?? []) ? 'checked' : '' }}> {{ $item }}
                    </div>
                @endforeach
            </div>

            <div class="form-group m-3">
                <label for="apto">Equipamento apto para uso?</label>
                <select class="form-control rounded-input mt-2" id="apto" name="apto"
                    aria-label="Disabled select example" style="width: 150px;">
                    <option value="0" {{ old('apto', $inspecao->apto) == '0' ? 'selected' : '' }}>Não</option>
                    <option value="1" {{ old('apto', $inspecao->apto) == '1' ? 'selected' : '' }}>Sim</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Salvar Alterações</button>
        </form>
    </div>

</x-app-layout>
