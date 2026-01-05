<?php

namespace App\Libraries;

use App\Libraries\Components\Statistics\KpiCard;
use App\Libraries\Components\Statistics\MetricCard;
use App\Libraries\Components\Statistics\ProgressBar;

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
        if ($title) $card->setTitle($title);
        if ($value) $card->setValue($value);
        if ($icon)  $card->setIcon($icon);
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
        if ($label)  $card->setLabel($label);
        if ($amount) $card->setAmount($amount);
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
        if ($label) $bar->setLabel($label);
        return $bar;
    }

    // =========================================================================
    // COMPONENTES TABLES
    // TODO: Lizbeth agregará aquí sus métodos
    // =========================================================================

    // public function dataTable(): DataTable { ... }
    // public function simpleTable(): SimpleTable { ... }
    // public function summaryTable(): SummaryTable { ... }

    // =========================================================================
    // COMPONENTES LAYOUT
    // TODO: Javier agregará aquí sus métodos
    // =========================================================================

    // public function card(): Card { ... }
    // public function alert(): Alert { ... }
    // public function panel(): Panel { ... }
    // public function grid(): Grid { ... }

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
