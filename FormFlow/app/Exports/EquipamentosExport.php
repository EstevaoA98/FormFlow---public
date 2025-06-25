<?php
namespace App\Exports;

use App\Models\Equipamento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class EquipamentosExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Equipamento::all()->map(function ($equipamento) {
            return [
                'ID' => $equipamento->id,
                'Nome' => $equipamento->nome,
                'Descrição' => $equipamento->descricao,
                'Marca' => $equipamento->marca,
                'Status' => $equipamento->status ? 'Ativo' : 'Inativo',
                'Tipo' => $equipamento->tipo,
                'Modelo' => $equipamento->modelo,
                'Número de Série' => $equipamento->numero_serie,
                'Teste Elétrico' => optional($equipamento->dataTesteEletrico)->format('d/m/Y'),
                'Teste de Calibração' => optional($equipamento->dataTesteCalibracao)->format('d/m/Y'),
                'Data de Cadastro' => optional($equipamento->created_at)->format('d/m/Y'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Descrição',
            'Marca',
            'Status',
            'Tipo',
            'Modelo',
            'Número de Série',
            'Teste Elétrico',
            'Teste de Calibração',
            'Data de Cadastro',
        ];
    }
}
