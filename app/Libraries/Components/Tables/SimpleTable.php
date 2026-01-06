<?php

namespace App\Libraries\Components\Tables;

use App\Libraries\Components\Base\BaseComponent;

/**
 * SimpleTable
 * Componente básico para renderizar tablas HTML estandarizadas.
 */
class SimpleTable extends BaseComponent
{
    protected $headers = [];
    protected $rows = [];
    protected $striped = false;
    protected $hover = false;

    public function __construct()
    {
        parent::__construct();
        $this->addClass('table-responsive'); // Contenedor responsivo por defecto
    }

    /**
     * Define los encabezados de la tabla.
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Establece las filas de datos.
     * Convierte automáticamente objetos a arrays para evitar errores.
     */
    public function setRows(array $data)
    {
        $cleanRows = [];
        foreach ($data as $row) {
            // Convertimos objetos (stdClass/Entities) a array simple
            $rowArray = (array) $row;
            $cleanRows[] = array_values($rowArray);
        }
        $this->rows = $cleanRows;
        return $this;
    }

    /**
     * Habilita el estilo "Striped" (filas alternas).
     */
    public function isStriped(bool $enable = true)
    {
        $this->striped = $enable;
        return $this;
    }

    /**
     * Renderiza la tabla HTML.
     */
    public function render(): string
    {
        // Clases CSS de Nifty/Bootstrap
        $tableClasses = 'table align-middle mb-0';
        if ($this->striped) $tableClasses .= ' table-striped';
        
        // Construcción del THEAD
        $thead = '';
        if (!empty($this->headers)) {
            $thead = '<thead class="table-light"><tr>';
            foreach ($this->headers as $h) {
                $thead .= "<th class='text-uppercase small fw-bold'>{$this->escape($h)}</th>";
            }
            $thead .= '</tr></thead>';
        }

        // Construcción del TBODY
        $tbody = '<tbody>';
        if (empty($this->rows)) {
            $cols = count($this->headers) ?: 1;
            $tbody .= "<tr><td colspan='{$cols}' class='text-center text-muted p-3'>Sin datos</td></tr>";
        } else {
            foreach ($this->rows as $row) {
                $tbody .= '<tr>';
                foreach ($row as $cell) {
                    $tbody .= "<td>{$cell}</td>"; // Permitimos HTML (badges, links)
                }
                $tbody .= '</tr>';
            }
        }
        $tbody .= '</tbody>';

        // Renderizado Final
        return "
        <div {$this->buildAttributes()}>
            <table class='{$tableClasses}'>
                {$thead}
                {$tbody}
            </table>
        </div>";
    }
}