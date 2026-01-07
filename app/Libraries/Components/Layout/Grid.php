<?php

namespace App\Libraries\Components\Layout;

use App\Libraries\Components\Base\BaseComponent;

/**
 * Grid Component
 * 
 * Componente de grilla/cuadrícula para organizar elementos en filas y columnas.
 * Basado en el sistema de grillas de Bootstrap.
 * 
 * @author Javier
 * @package App\Libraries\Components\Layout
 */
class Grid extends BaseComponent
{
    protected array $items = [];
    protected int $columns = 3; // Número de columnas por defecto
    protected string $gap = 'normal'; // none, small, normal, large
    protected bool $responsive = true;
    protected string $alignment = 'start'; // start, center, end, stretch

    public function __construct()
    {
        parent::__construct();
        $this->addClass('row');
    }

    // --- Setters para configuración fluida ---

    /**
     * Agrega un elemento a la grilla
     */
    public function addItem(string $content, int $cols = 0): self
    {
        $this->items[] = [
            'content' => $content,
            'cols' => $cols
        ];
        return $this;
    }

    /**
     * Agrega múltiples elementos
     */
    public function setItems(array $items): self
    {
        foreach ($items as $item) {
            if (is_string($item)) {
                $this->addItem($item);
            } elseif (is_array($item)) {
                $this->addItem($item['content'] ?? '', $item['cols'] ?? 0);
            }
        }
        return $this;
    }

    /**
     * Establece el número de columnas
     */
    public function setColumns(int $columns): self
    {
        $this->columns = max(1, min(12, $columns));
        return $this;
    }

    /**
     * Establece el espacio entre elementos
     */
    public function setGap(string $gap): self
    {
        $this->gap = $gap;
        return $this;
    }

    /**
     * Activa/desactiva diseño responsivo
     */
    public function responsive(bool $responsive = true): self
    {
        $this->responsive = $responsive;
        return $this;
    }

    /**
     * Establece la alineación de los elementos
     */
    public function setAlignment(string $alignment): self
    {
        $this->alignment = $alignment;
        return $this;
    }

    // --- Métodos de conveniencia ---

    public function twoColumns(): self
    {
        return $this->setColumns(2);
    }

    public function threeColumns(): self
    {
        return $this->setColumns(3);
    }

    public function fourColumns(): self
    {
        return $this->setColumns(4);
    }

    // --- Renderizado ---

    public function render(): string
    {
        // Gap
        $gapClass = match ($this->gap) {
            'none' => 'g-0',
            'small' => 'g-2',
            'large' => 'g-5',
            default => 'g-3'
        };
        $this->addClass($gapClass);

        // Alineación
        $alignClass = match ($this->alignment) {
            'center' => 'align-items-center justify-content-center',
            'end' => 'align-items-end justify-content-end',
            'stretch' => 'align-items-stretch',
            default => 'align-items-start'
        };
        $this->addClass($alignClass);

        // Calcular clases de columna
        $colSize = intval(12 / $this->columns);

        // Generar items
        $itemsHtml = '';
        foreach ($this->items as $item) {
            $cols = $item['cols'] > 0 ? $item['cols'] : $colSize;

            if ($this->responsive) {
                // Clases responsivas: 12 en móvil, 6 en tablet, cols en desktop
                $colClass = "col-12 col-md-6 col-lg-{$cols}";
            } else {
                $colClass = "col-{$cols}";
            }

            $itemsHtml .= "<div class='{$colClass}'>{$item['content']}</div>";
        }

        return "
        <div {$this->buildAttributes()}>
            {$itemsHtml}
        </div>";
    }
}
