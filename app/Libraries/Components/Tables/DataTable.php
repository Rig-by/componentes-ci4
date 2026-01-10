<?php

namespace App\Libraries\Components\Tables;

use App\Libraries\Components\Base\BaseComponent;

class DataTable extends BaseComponent
{
    protected $columns = []; // Definición de columnas y sus formatos
    protected $data = [];    // Los datos crudos (array de objetos o arrays)

    public function __construct()
    {
        parent::__construct();
        $this->addClass('table table-striped table-hover align-middle');
    }

    /**
     * Define una columna.
     * @param string $key La clave del array de datos (ej: 'status')
     * @param string $label El título de la columna (ej: 'Estado')
     * @param callable|null $formatter Función anónima para dar formato (Opcional)
     */
    public function addColumn(string $key, string $label, callable $formatter = null)
    {
        $this->columns[] = [
            'key' => $key,
            'label' => $label,
            'formatter' => $formatter
        ];
        return $this;
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function render(): string
    {
        // 1. Renderizar Encabezados
        $thead = '<thead class="table-light"><tr>';
        foreach ($this->columns as $col) {
            $thead .= "<th class='text-uppercase small fw-bold'>{$col['label']}</th>";
        }
        $thead .= '</tr></thead>';

        // 2. Renderizar Cuerpo con Lógica
        $tbody = '<tbody>';
        if (empty($this->data)) {
            $cols = count($this->columns);
            $tbody .= "<tr><td colspan='{$cols}' class='text-center p-4'>Sin resultados</td></tr>";
        } else {
            foreach ($this->data as $row) {
                // Convertimos objeto a array si es necesario
                $row = (array) $row; 
                $tbody .= '<tr>';
                
                foreach ($this->columns as $col) {
                    $key = $col['key'];
                    $value = $row[$key] ?? ''; // Valor crudo

                    // APLICAR FORMATO SI EXISTE (Aquí está la lógica avanzada)
                    if (isset($col['formatter']) && is_callable($col['formatter'])) {
                        // Pasamos el valor y la fila completa por si se necesita otro dato
                        $value = call_user_func($col['formatter'], $value, $row);
                    }

                    $tbody .= "<td>{$value}</td>";
                }
                $tbody .= '</tr>';
            }
        }
        $tbody .= '</tbody>';

        // Envolver en Card y Responsive (Estilo Nifty)
        return "
        <div class='card mb-3'>
            <div class='table-responsive'>
                <table {$this->buildAttributes()}>
                    {$thead}
                    {$tbody}
                </table>
            </div>
        </div>";
    }
}
