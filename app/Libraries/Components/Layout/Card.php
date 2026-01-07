<?php

namespace App\Libraries\Components\Layout;

use App\Libraries\Components\Base\BaseComponent;

/**
 * Card
 * Componente de tarjeta flexible con header, body y footer opcionales.
 * Soporta múltiples variantes, iconos, imágenes y efectos.
 * 
 * @author Javier
 * @package App\Libraries\Components\Layout
 */
class Card extends BaseComponent
{
    protected $title = '';
    protected $subtitle = '';
    protected $content = '';
    protected $footer = '';
    protected $headerIcon = '';
    protected $variant = '';      // primary, success, warning, danger, info
    protected $image = '';        // URL de imagen superior
    protected $imageAlt = '';
    protected $shadow = false;    // Sombra
    protected $hover = false;     // Efecto hover
    protected $border = true;     // Mostrar borde
    protected $headerBg = false;  // Fondo de color en header

    public function __construct()
    {
        parent::__construct();
        $this->addClass('card mb-3');
    }

    // --- Setters para configuración fluida ---

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setSubtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    public function setFooter(string $footer)
    {
        $this->footer = $footer;
        return $this;
    }

    public function setIcon(string $icon)
    {
        $this->headerIcon = $icon;
        return $this;
    }

    public function setVariant(string $variant)
    {
        $this->variant = $variant;
        return $this;
    }

    /**
     * Agrega una imagen en la parte superior de la card
     */
    public function setImage(string $url, string $alt = '')
    {
        $this->image = $url;
        $this->imageAlt = $alt;
        return $this;
    }

    /**
     * Agrega sombra a la card
     */
    public function withShadow(bool $shadow = true)
    {
        $this->shadow = $shadow;
        return $this;
    }

    /**
     * Agrega efecto hover (elevación al pasar el mouse)
     */
    public function withHover(bool $hover = true)
    {
        $this->hover = $hover;
        return $this;
    }

    /**
     * Quita el borde de la card
     */
    public function noBorder()
    {
        $this->border = false;
        return $this;
    }

    /**
     * Hace que el header tenga fondo con el color del variant
     */
    public function headerWithBg(bool $bg = true)
    {
        $this->headerBg = $bg;
        return $this;
    }

    // --- Métodos de conveniencia ---

    public function primary()
    {
        $this->variant = 'primary';
        return $this;
    }

    public function success()
    {
        $this->variant = 'success';
        return $this;
    }

    public function warning()
    {
        $this->variant = 'warning';
        return $this;
    }

    public function danger()
    {
        $this->variant = 'danger';
        return $this;
    }

    public function info()
    {
        $this->variant = 'info';
        return $this;
    }

    public function dark()
    {
        $this->variant = 'dark';
        return $this;
    }

    // --- Renderizado ---

    public function render(): string
    {
        // Clases condicionales
        if ($this->shadow) {
            $this->addClass('shadow');
        }
        if ($this->hover) {
            $this->addClass('card-hover');
            $this->addStyle('transition', 'transform 0.2s, box-shadow 0.2s');
        }
        if (!$this->border) {
            $this->addClass('border-0');
        }
        if ($this->variant && !$this->headerBg) {
            $this->addClass("border-{$this->variant}");
        }

        // Imagen superior
        $imageHtml = '';
        if ($this->image) {
            $alt = $this->imageAlt ?: $this->title;
            $imageHtml = "<img src='{$this->image}' class='card-img-top' alt='{$this->escape($alt)}'>";
        }

        // Header
        $headerHtml = '';
        if ($this->title || $this->headerIcon) {
            $iconHtml = $this->headerIcon ? "<i class='{$this->headerIcon} me-2'></i>" : '';
            $subtitleHtml = $this->subtitle ? "<small class='text-muted d-block'>{$this->escape($this->subtitle)}</small>" : '';

            // Determinar clase del header
            $headerClass = 'card-header';
            if ($this->variant && $this->headerBg) {
                $headerClass .= " bg-{$this->variant} text-white";
            } elseif ($this->variant) {
                $headerClass .= " bg-{$this->variant} bg-opacity-10 text-{$this->variant}";
            }

            $headerHtml = "
                <div class='{$headerClass}'>
                    {$iconHtml}<span class='fw-semibold'>{$this->escape($this->title)}</span>
                    {$subtitleHtml}
                </div>";
        }

        // Body
        $bodyHtml = '';
        if ($this->content) {
            $bodyHtml = "<div class='card-body'>{$this->content}</div>";
        }

        // Footer
        $footerHtml = '';
        if ($this->footer) {
            $footerClass = 'card-footer';
            if ($this->variant && $this->headerBg) {
                $footerClass .= " bg-{$this->variant} bg-opacity-10";
            }
            $footerHtml = "<div class='{$footerClass}'>{$this->footer}</div>";
        }

        return "
        <div {$this->buildAttributes()}>
            {$imageHtml}
            {$headerHtml}
            {$bodyHtml}
            {$footerHtml}
        </div>";
    }
}
