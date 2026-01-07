<?php

namespace App\Libraries\Components\Layout;

use App\Libraries\Components\Base\BaseComponent;

/**
 * Grid
 * Componente de grilla/cuadrícula para organizar elementos.
 * Basado en el sistema de grillas de Bootstrap con opciones avanzadas.
 * 
 * @author Javier
 * @package App\Libraries\Components\Layout
 */
class Grid extends BaseComponent
{
    protected $items = [];
    protected $columns = 3;        // Número de columnas por defecto
    protected $gap = 3;            // Espaciado entre elementos (0-5)
    protected $responsive = true;  // Activar breakpoints responsivos
    protected $alignment = 'start';// start, center, end, stretch
    protected $justify = 'start';  // start, center, end, between, around, evenly
    protected $equalHeight = false;// Hacer todas las columnas de igual altura

    public function __construct()
    {
        parent::__construct();
        $this->addClass('row');
    }

    // --- Setters para configuración fluida ---

    /**
     * Agrega un elemento a la grilla
     * @param string $content HTML del contenido
     * @param int $cols Columnas que ocupa (0 = automático)
     * @param string $classes Clases adicionales para el item
     */
    public function addItem(string $content, int $cols = 0, string $classes = '')
    {
        $this->items[] = [
            'content' => $content,
            'cols' => $cols,
            'classes' => $classes
        ];
        return $this;
    }

    /**
     * Agrega múltiples elementos de una vez
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            if (is_string($item)) {
                $this->addItem($item);
            } elseif (is_array($item) && isset($item['content'])) {
                $this->addItem(
                    $item['content'],
                    $item['cols'] ?? 0,
                    $item['classes'] ?? ''
                );
            }
        }
        return $this;
    }

    /**
     * Establece el número de columnas
     */
    public function setColumns(int $columns)
    {
        $this->columns = max(1, min(12, $columns));
        return $this;
    }

    /**
     * Establece el espaciado entre elementos (0-5)
     */
    public function setGap(int $gap)
    {
        $this->gap = max(0, min(5, $gap));
        return $this;
    }

    /**
     * Desactiva la adaptación responsiva
     */
    public function noResponsive()
    {
        $this->responsive = false;
        return $this;
    }

    /**
     * Alineación vertical de los items
     */
    public function setAlignment(string $alignment)
    {
        $this->alignment = $alignment;
        return $this;
    }

    /**
     * Justificación horizontal de los items
     */
    public function setJustify(string $justify)
    {
        $this->justify = $justify;
        return $this;
    }

    /**
     * Hace que todas las columnas tengan la misma altura
     */
    public function equalHeight(bool $equal = true)
    {
        $this->equalHeight = $equal;
        return $this;
    }

    // --- Métodos de conveniencia para columnas ---

    public function oneColumn()
    {
        return $this->setColumns(1);
    }

    public function twoColumns()
    {
        return $this->setColumns(2);
    }

    public function threeColumns()
    {
        return $this->setColumns(3);
    }

    public function fourColumns()
    {
        return $this->setColumns(4);
    }

    public function sixColumns()
    {
        return $this->setColumns(6);
    }

    // --- Métodos de conveniencia para alineación ---

    public function alignCenter()
    {
        $this->alignment = 'center';
        return $this;
    }

    public function alignEnd()
    {
        $this->alignment = 'end';
        return $this;
    }

    public function alignStretch()
    {
        $this->alignment = 'stretch';
        return $this;
    }

    public function justifyCenter()
    {
        $this->justify = 'center';
        return $this;
    }

    public function justifyBetween()
    {
        $this->justify = 'between';
        return $this;
    }

    public function justifyAround()
    {
        $this->justify = 'around';
        return $this;
    }

    // --- Renderizado ---

    public function render(): string
    {
        // Gap
        $this->addClass("g-{$this->gap}");

        // Alineación vertical
        if ($this->alignment !== 'start') {
            $this->addClass("align-items-{$this->alignment}");
        }

        // Justificación horizontal
        if ($this->justify !== 'start') {
            $this->addClass("justify-content-{$this->justify}");
        }

        // Calcular tamaño de columna por defecto
        $colSize = intval(12 / $this->columns);

        // Generar items
        $itemsHtml = '';
        foreach ($this->items as $item) {
            $cols = $item['cols'] > 0 ? $item['cols'] : $colSize;
            $extraClasses = $item['classes'] ? " {$item['classes']}" : '';

            if ($this->responsive) {
                // Responsive: 12 en móvil, 6 en tablet, cols en desktop
                $colClass = "col-12 col-md-6 col-lg-{$cols}";
            } else {
                $colClass = "col-{$cols}";
            }

            // Igual altura
            if ($this->equalHeight) {
                $colClass .= ' d-flex';
            }

            $itemsHtml .= "<div class='{$colClass}{$extraClasses}'>{$item['content']}</div>";
        }

        return "
        <div {$this->buildAttributes()}>
            {$itemsHtml}
        </div>";
    }
}
