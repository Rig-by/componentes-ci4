<?php

namespace App\Libraries\Components\Layout;

use App\Libraries\Components\Base\BaseComponent;

/**
 * Panel
 * Componente de panel/sección con título y contenido.
 * Similar a Card pero más simple, ideal para agrupar contenido.
 * Soporta múltiples variantes, colapsable y toolbar.
 * 
 * @author Javier
 * @package App\Libraries\Components\Layout
 */
class Panel extends BaseComponent
{
    protected $title = '';
    protected $content = '';
    protected $icon = '';
    protected $variant = 'light';   // light, dark, primary, secondary, etc.
    protected $bordered = true;
    protected $rounded = true;
    protected $padding = 'normal';  // none, small, normal, large
    protected $collapsible = false;
    protected $collapsed = false;
    protected $toolbar = '';        // HTML para toolbar/acciones en el header
    protected $footer = '';

    public function __construct()
    {
        parent::__construct();
        $this->addClass('panel mb-3');
    }

    // --- Setters para configuración fluida ---

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    public function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function setVariant(string $variant)
    {
        $this->variant = $variant;
        return $this;
    }

    /**
     * Quita el borde del panel
     */
    public function noBorder()
    {
        $this->bordered = false;
        return $this;
    }

    /**
     * Quita bordes redondeados
     */
    public function noRounded()
    {
        $this->rounded = false;
        return $this;
    }

    /**
     * Establece el padding: none, small, normal, large
     */
    public function setPadding(string $padding)
    {
        $this->padding = $padding;
        return $this;
    }

    /**
     * Hace el panel colapsable
     */
    public function isCollapsible(bool $collapsed = false)
    {
        $this->collapsible = true;
        $this->collapsed = $collapsed;
        return $this;
    }

    /**
     * Agrega toolbar/acciones al header
     */
    public function setToolbar(string $html)
    {
        $this->toolbar = $html;
        return $this;
    }

    /**
     * Agrega un footer al panel
     */
    public function setFooter(string $footer)
    {
        $this->footer = $footer;
        return $this;
    }

    // --- Métodos de conveniencia ---

    public function light()
    {
        $this->variant = 'light';
        return $this;
    }

    public function dark()
    {
        $this->variant = 'dark';
        return $this;
    }

    public function primary()
    {
        $this->variant = 'primary';
        return $this;
    }

    public function white()
    {
        $this->variant = 'white';
        return $this;
    }

    // --- Renderizado ---

    public function render(): string
    {
        // Clases base
        $this->addClass("bg-{$this->variant}");

        if ($this->bordered) {
            $this->addClass('border');
        }

        if ($this->rounded) {
            $this->addClass('rounded');
        }

        // Padding
        $paddingClass = match ($this->padding) {
            'none' => 'p-0',
            'small' => 'p-2',
            'large' => 'p-4',
            default => 'p-3'
        };
        $this->addClass($paddingClass);

        // ID para collapse
        $collapseId = "panel-collapse-{$this->id}";

        // Título y Header
        $headerHtml = '';
        if ($this->title || $this->toolbar) {
            $iconHtml = $this->icon ? "<i class='{$this->icon} me-2'></i>" : '';

            // Botón de collapse
            $collapseBtn = '';
            if ($this->collapsible) {
                $chevron = $this->collapsed ? 'bi-chevron-right' : 'bi-chevron-down';
                $collapseBtn = "
                    <button class='btn btn-sm btn-link p-0 text-decoration-none' type='button' 
                            data-bs-toggle='collapse' data-bs-target='#{$collapseId}'>
                        <i class='bi {$chevron}'></i>
                    </button>";
            }

            $headerHtml = "
                <div class='panel-header mb-3 pb-2 border-bottom d-flex justify-content-between align-items-center'>
                    <h5 class='mb-0 d-flex align-items-center'>
                        {$collapseBtn}
                        {$iconHtml}{$this->escape($this->title)}
                    </h5>
                    <div class='panel-toolbar'>{$this->toolbar}</div>
                </div>";
        }

        // Body (colapsable si aplica)
        $bodyClass = 'panel-body';
        $bodyAttrs = '';
        if ($this->collapsible) {
            $bodyClass .= ' collapse' . ($this->collapsed ? '' : ' show');
            $bodyAttrs = "id='{$collapseId}'";
        }

        $bodyHtml = "<div class='{$bodyClass}' {$bodyAttrs}>{$this->content}</div>";

        // Footer
        $footerHtml = '';
        if ($this->footer) {
            $footerHtml = "<div class='panel-footer mt-3 pt-2 border-top'>{$this->footer}</div>";
        }

        return "
        <div {$this->buildAttributes()}>
            {$headerHtml}
            {$bodyHtml}
            {$footerHtml}
        </div>";
    }
}
