<?php

namespace App\Libraries\Components\Layout;

use App\Libraries\Components\Base\BaseComponent;

/**
 * Panel Component
 * 
 * Componente de panel/sección con título y contenido.
 * Similar a Card pero más simple, ideal para agrupar contenido.
 * 
 * @author Javier
 * @package App\Libraries\Components\Layout
 */
class Panel extends BaseComponent
{
    protected string $title = '';
    protected string $content = '';
    protected string $icon = '';
    protected string $variant = 'light'; // light, dark, primary, secondary, etc.
    protected bool $bordered = true;
    protected bool $rounded = true;
    protected string $padding = 'normal'; // none, small, normal, large

    public function __construct()
    {
        parent::__construct();
        $this->addClass('panel');
    }

    // --- Setters para configuración fluida ---

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    public function setVariant(string $variant): self
    {
        $this->variant = $variant;
        return $this;
    }

    public function bordered(bool $bordered = true): self
    {
        $this->bordered = $bordered;
        return $this;
    }

    public function rounded(bool $rounded = true): self
    {
        $this->rounded = $rounded;
        return $this;
    }

    public function setPadding(string $padding): self
    {
        $this->padding = $padding;
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
            'large' => 'p-5',
            default => 'p-3'
        };
        $this->addClass($paddingClass);

        // Título
        $titleHtml = '';
        if ($this->title) {
            $iconHtml = $this->icon ? "<i class='{$this->icon} me-2'></i>" : '';
            $titleHtml = "
                <div class='panel-header mb-3 pb-2 border-bottom'>
                    <h5 class='mb-0'>{$iconHtml}{$this->escape($this->title)}</h5>
                </div>";
        }

        return "
        <div {$this->buildAttributes()}>
            {$titleHtml}
            <div class='panel-body'>
                {$this->content}
            </div>
        </div>";
    }
}
