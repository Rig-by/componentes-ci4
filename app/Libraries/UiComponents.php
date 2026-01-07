<?php

namespace App\Libraries;

use App\Libraries\Components\Statistics\KpiCard;
use App\Libraries\Components\Statistics\MetricCard;
use App\Libraries\Components\Statistics\ProgressBar;
use App\Libraries\Components\Tables\SummaryTable;
use App\Libraries\Components\Tables\SimpleTable;
use App\Libraries\Components\Tables\DataTable;
use App\Libraries\Components\Base\BaseComponent;
use App\Libraries\Components\Layout\Card;
use App\Libraries\Components\Layout\Alert;
use App\Libraries\Components\Layout\Panel;
use App\Libraries\Components\Layout\Grid;


/**
 * UiComponents
 * 
 * Librería principal para crear componentes de interfaz de usuario.
 * Actúa como factory para todos los componentes del sistema.
 * 
 * @author Rigoberto (Líder del proyecto)
 * @package App\Libraries
 */
class UiComponents
{
    /**
     * Versión de la librería
     */
    const VERSION = '1.0.0';

    /**
     * Constructor
     */
    public function __construct()
    {
        // Inicialización si es necesaria
    }

    // =========================================================================
    // COMPONENTES STATISTICS
    // Creados por: Rigoberto
    // =========================================================================

    /**
     * Crea un componente KpiCard
     * Tarjeta con KPI que muestra valor, título, icono y cambio porcentual
     * 
     * @return KpiCard
     */
    public function kpiCard(string $title = '', string $value = '', string $icon = '', string $color = 'primary'): KpiCard
    {
        $card = new KpiCard();
        if ($title)
            $card->setTitle($title);
        if ($value)
            $card->setValue($value);
        if ($icon)
            $card->setIcon($icon);
        $card->setColor($color);
        return $card;
    }

    /**
     * Crea un componente MetricCard
     * Tarjeta simple para mostrar una métrica
     * 
     * @return MetricCard
     */
    public function metricCard(string $label = '', string $amount = ''): MetricCard
    {
        $card = new MetricCard();
        if ($label)
            $card->setLabel($label);
        if ($amount)
            $card->setAmount($amount);
        return $card;
    }

    /**
     * Crea un componente ProgressBar
     * Barra de progreso con porcentaje
     * 
     * @return ProgressBar
     */
    public function progressBar(int $percent = 0, string $color = 'primary', string $label = ''): ProgressBar
    {
        $bar = new ProgressBar();
        $bar->setPercent($percent);
        $bar->setColor($color);
        if ($label)
            $bar->setLabel($label);
        return $bar;
    }

    // =========================================================================
    // COMPONENTES TABLES
    // TODO: Lizbeth agregará aquí sus métodos
    // =========================================================================

    /**
     * MODO AVANZADO: Tabla inteligente (DataTable).
     * Permite configuración detallada de columnas, callbacks y acciones.
     * * @return DataTable
     */
    public function smartTable(): DataTable
    {
        return new DataTable();
    }

    /**
     * MODO RÁPIDO: Tabla simple.
     * Ideal para volcados rápidos de datos sin configuración compleja.
     * * @param array $headers Lista de encabezados ['ID', 'Nombre', ...]
     * @param array $data    Array de datos (objetos o arrays)
     * @return SimpleTable
     */
    public function simpleTable(array $headers, array $data): SimpleTable
    {
        $table = new SimpleTable();
        // Pasamos datos crudos; el componente se encarga de limpiarlos
        return $table->setHeaders($headers)->setRows($data);
    }

    /**
     * MODO REPORTE: Tabla de resumen (SummaryTable).
     * Incluye una fila de totales al pie de la tabla.
     * * @param array $headers Encabezados
     * @param array $data    Cuerpo de datos
     * @param array $totals  Fila de totales para el footer
     * @return SummaryTable
     */
    public function summaryTable(array $headers, array $data, array $totals): SummaryTable
    {
        $table = new SummaryTable();
        $table->setHeaders($headers)
            ->setRows($data)
            ->setTotals($totals);

        return $table;
    }
    // =========================================================================
    // COMPONENTES LAYOUT
    // Creados por: Javier
    // =========================================================================

    /**
     * Crea un componente Card
     * Tarjeta flexible con header, body y footer opcionales
     * 
     * @return Card
     */
    public function card(string $title = '', string $content = ''): Card
    {
        $card = new Card();
        if ($title)
            $card->setTitle($title);
        if ($content)
            $card->setContent($content);
        return $card;
    }

    /**
     * Crea un componente Alert
     * Alerta/notificación con diferentes tipos
     * 
     * @return Alert
     */
    public function alert(string $message = '', string $type = 'info'): Alert
    {
        $alert = new Alert();
        if ($message)
            $alert->setMessage($message);
        $alert->setType($type);
        return $alert;
    }

    /**
     * Crea un componente Panel
     * Panel simple para agrupar contenido
     * 
     * @return Panel
     */
    public function panel(string $title = '', string $content = ''): Panel
    {
        $panel = new Panel();
        if ($title)
            $panel->setTitle($title);
        if ($content)
            $panel->setContent($content);
        return $panel;
    }

    /**
     * Crea un componente Grid
     * Grilla responsive para organizar elementos
     * 
     * @return Grid
     */
    public function grid(int $columns = 3): Grid
    {
        $grid = new Grid();
        $grid->setColumns($columns);
        return $grid;
    }

    // =========================================================================
    // COMPONENTES STATISTICS AVANZADO + DISPLAY
    // TODO: Zulema agregará aquí sus métodos
    // =========================================================================

    // public function statBadge(): StatBadge { ... }
    // public function comparisonCard(): ComparisonCard { ... }
    // public function timeline(): Timeline { ... }

    /**
     * Obtiene la versión de la librería
     * 
     * @return string
     */
    public function getVersion(): string
    {
        return self::VERSION;
    }
}
