<?php

namespace App\Libraries\Components\Layout;

use App\Libraries\Components\Base\BaseComponent;

/**
 * Card Component
 * 
 * Componente de tarjeta flexible con header, body y footer opcionales.
 * 
 * @author Javier
 * @package App\Libraries\Components\Layout
 */
class Card extends BaseComponent
{
    protected string $title = '';
    protected string $subtitle = '';
    protected string $content = '';
    protected string $footer = '';
    protected string $headerIcon = '';
    protected string $variant = ''; // primary, success, warning, danger, info
    protected bool $shadow = false;
    protected bool $collapsible = false;
    protected bool $collapsed = false;

    public function __construct()
    {
        parent::__construct();
        $this->addClass('card');
    }

    // --- Setters para configuración fluida ---

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function setFooter(string $footer): self
    {
        $this->footer = $footer;
        return $this;
    }

    public function setHeaderIcon(string $icon): self
    {
        $this->headerIcon = $icon;
        return $this;
    }

    public function setVariant(string $variant): self
    {
        $this->variant = $variant;
        return $this;
    }

    public function withShadow(bool $shadow = true): self
    {
        $this->shadow = $shadow;
        return $this;
    }

    public function collapsible(bool $collapsible = true, bool $collapsed = false): self
    {
        $this->collapsible = $collapsible;
        $this->collapsed = $collapsed;
        return $this;
    }

    // --- Renderizado ---

    public function render(): string
    {
        // Agregar clases condicionales
        if ($this->shadow) {
            $this->addClass('shadow');
        }
        if ($this->variant) {
            $this->addClass("border-{$this->variant}");
        }

        // Header
        $headerHtml = '';
        if ($this->title || $this->headerIcon) {
            $iconHtml = $this->headerIcon ? "<i class='{$this->headerIcon} me-2'></i>" : '';
            $subtitleHtml = $this->subtitle ? "<small class='text-muted d-block'>{$this->escape($this->subtitle)}</small>" : '';

            $headerClass = $this->variant ? "card-header bg-{$this->variant} text-white" : "card-header";

            $collapseBtn = '';
            if ($this->collapsible) {
                $collapseTarget = "collapse-{$this->id}";
                $collapseBtn = "
                    <button class='btn btn-sm btn-link ms-auto p-0' type='button' data-bs-toggle='collapse' data-bs-target='#{$collapseTarget}'>
                        <i class='bi bi-chevron-down'></i>
                    </button>";
            }

            $headerHtml = "
                <div class='{$headerClass} d-flex align-items-center'>
                    <div>
                        {$iconHtml}<span class='fw-semibold'>{$this->escape($this->title)}</span>
                        {$subtitleHtml}
                    </div>
                    {$collapseBtn}
                </div>";
        }

        // Body
        $bodyHtml = '';
        if ($this->content) {
            $collapseClass = '';
            $collapseId = '';
            if ($this->collapsible) {
                $collapseId = "id='collapse-{$this->id}'";
                $collapseClass = $this->collapsed ? 'collapse' : 'collapse show';
            }
            $bodyHtml = "<div class='card-body {$collapseClass}' {$collapseId}>{$this->content}</div>";
        }

        // Footer
        $footerHtml = '';
        if ($this->footer) {
            $footerHtml = "<div class='card-footer'>{$this->footer}</div>";
        }

        return "
        <div {$this->buildAttributes()}>
            {$headerHtml}
            {$bodyHtml}
            {$footerHtml}
        </div>";
    }
}
