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
    public function kpiCard(): KpiCard
    {
        return new KpiCard();
    }

    /**
     * Crea un componente MetricCard
     * Tarjeta simple para mostrar una métrica
     * 
     * @return MetricCard
     */
    public function metricCard(): MetricCard
    {
        return new MetricCard();
    }

    /**
     * Crea un componente ProgressBar
     * Barra de progreso con porcentaje
     * 
     * @return ProgressBar
     */
    public function progressBar(): ProgressBar
    {
        return new ProgressBar();
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
    /**
     * Crea un componente StatBadge
     * Insignia de estadística con valor, label, color e icono
     * 
     * @param array $data
     * @return string
     */
    public function statBadge(array $data = []): string
    {
        $component = new \App\Libraries\Components\Statistics\StatBadge();
        return $component->render($data);
    }

    /**
     * Crea un componente ComparisonCard
     * Tarjeta que compara valores actuales vs anteriores
     * 
     * @param array $data
     * @return string
     */
    public function comparisonCard(array $data = []): string
    {
        $component = new \App\Libraries\Components\Statistics\ComparisonCard();
        return $component->render($data);
    }

    /**
     * Crea un componente Timeline
     * Línea de tiempo para mostrar eventos cronológicos
     * 
     * @param array $data
     * @return string
     */
    public function timeline(array $data = []): string
    {
        $component = new \App\Libraries\Components\Display\Timeline();
        return $component->render($data);
    }
        

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
