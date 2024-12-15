<?php

namespace App\Exports;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithHeadings
{
    protected $tasks;

    public function __construct(Collection $tasks)
    {
        $this->tasks = $tasks->map(function ($task) {
            return [
                'ID' => $task->id,
                'Fecha de Inicio' => $task->fecha_inicio,
                'Asunto' => $task->asunto ? $task->asunto->nombre : 'Sin asunto',
                'Cliente' => $task->cliente ? $task->cliente->nombre_fiscal : 'Sin cliente',
                'Tipo' => $task->tipo ? $task->tipo->nombre : 'Sin tipo',
                'Estado' => $task->estado,
                'Fecha de Vencimiento' => $task->fecha_vencimiento,
                'Facturable' => $task->facturable ? 'Sí' : 'No',
                'Facturado' => $task->facturado ?? 'No',
                'Descripción' => $task->descripcion ?? '',
                'Observaciones' => $task->observaciones ?? '',
                'Suplido' => $task->suplido !== null ? number_format($task->suplido, 2) : '0.00',
                'Coste' => $task->coste !== null ? number_format($task->coste, 2) : '0.00',
                'Precio' => $task->precio !== null ? number_format($task->precio, 2) : '0.00',
                'Planificación' => $task->fecha_planificacion ?? '',
                'Usuarios Asignados' => $task->users->pluck('name')->join(', ') ?: 'Sin asignación',
            ];
        });
    }


    public function collection()
    {
        return $this->tasks;
    }
    public function headings(): array
    {
        return [
            'ID',
            'Fecha de Inicio',
            'Asunto',
            'Cliente',
            'Tipo',
            'Estado',
            'Fecha de Vencimiento',
            'Facturable',
            'Facturado',
            'Descripción',
            'Observaciones',
            'Suplido',
            'Coste',
            'Precio',
            'Planificación',
            'Usuarios Asignados',
        ];
    }
}
