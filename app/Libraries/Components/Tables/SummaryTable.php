<?php

namespace App\Libraries\Components\Tables;

/**
 * SummaryTable
 * Extiende de SimpleTable para agregar un pie de página (tfoot) con totales.
 */
class SummaryTable extends SimpleTable
{
    protected $totals = [];

    /**
     * Define la fila de totales.
     * El array debe tener el mismo número de columnas que los headers.
     */
    public function setTotals(array $totals)
    {
        $this->totals = $totals;
        return $this;
    }

    /**
     * Sobrescribe el render para inyectar el TFOOT.
     */
    public function render(): string
    {
        // Obtenemos el HTML base de la tabla simple
        $html = parent::render();

        if (empty($this->totals)) {
            return $html;
        }

        // Construimos el TFOOT
        $tfoot = '<tfoot class="table-light fw-bold border-top">';
        $tfoot .= '<tr>';
        foreach ($this->totals as $cell) {
            // Usamos espacio no rompible si la celda está vacía para mantener bordes
            $val = $cell !== '' ? $cell : '&nbsp;';
            $tfoot .= "<td>{$val}</td>";
        }
        $tfoot .= '</tr></tfoot>';

        // Inyectamos el tfoot antes del cierre de la tabla
        // (Buscamos </tbody> para insertarlo justo después)
        return str_replace('</tbody>', '</tbody>' . $tfoot, $html);
    }
}