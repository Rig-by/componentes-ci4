<?php

namespace App\Libraries\Components\Layout;

use App\Libraries\Components\Base\BaseComponent;

/**
 * Alert
 * Componente de alerta/notificación con diferentes tipos, iconos y efectos.
 * Soporta alertas dismissibles, con título, enlaces y botones.
 * 
 * @author Javier
 * @package App\Libraries\Components\Layout
 */
class Alert extends BaseComponent
{
    protected $message = '';
    protected $title = '';
    protected $type = 'info';      // primary, secondary, success, danger, warning, info
    protected $icon = '';
    protected $dismissible = false;
    protected $outlined = false;   // Solo borde, sin fondo
    protected $solid = false;      // Fondo sólido
    protected $link = '';          // Enlace opcional
    protected $linkText = '';
    protected $buttons = [];       // Botones de acción

    public function __construct()
    {
        parent::__construct();
        $this->addClass('alert');
    }

    // --- Setters para configuración fluida ---

    public function setMessage(string $message)
    {
        $this->message = $message;
        return $this;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function isDismissible(bool $dismissible = true)
    {
        $this->dismissible = $dismissible;
        return $this;
    }

    /**
     * Estilo outlined (solo borde, sin fondo)
     */
    public function isOutlined(bool $outlined = true)
    {
        $this->outlined = $outlined;
        return $this;
    }

    /**
     * Estilo solid (fondo sólido con texto blanco)
     */
    public function isSolid(bool $solid = true)
    {
        $this->solid = $solid;
        return $this;
    }

    /**
     * Agrega un enlace al final del mensaje
     */
    public function withLink(string $url, string $text = 'Ver más')
    {
        $this->link = $url;
        $this->linkText = $text;
        return $this;
    }

    /**
     * Agrega un botón de acción
     */
    public function addButton(string $text, string $url = '#', string $style = 'primary')
    {
        $this->buttons[] = [
            'text' => $text,
            'url' => $url,
            'style' => $style
        ];
        return $this;
    }

    // --- Métodos de conveniencia para tipos comunes ---

    public function success(string $message)
    {
        $this->type = 'success';
        $this->message = $message;
        $this->icon = 'bi-check-circle-fill';
        return $this;
    }

    public function danger(string $message)
    {
        $this->type = 'danger';
        $this->message = $message;
        $this->icon = 'bi-exclamation-triangle-fill';
        return $this;
    }

    public function warning(string $message)
    {
        $this->type = 'warning';
        $this->message = $message;
        $this->icon = 'bi-exclamation-circle-fill';
        return $this;
    }

    public function info(string $message)
    {
        $this->type = 'info';
        $this->message = $message;
        $this->icon = 'bi-info-circle-fill';
        return $this;
    }

    public function primary(string $message)
    {
        $this->type = 'primary';
        $this->message = $message;
        $this->icon = 'bi-bell-fill';
        return $this;
    }

    public function secondary(string $message)
    {
        $this->type = 'secondary';
        $this->message = $message;
        $this->icon = 'bi-chat-dots-fill';
        return $this;
    }

    // --- Renderizado ---

    public function render(): string
    {
        // Determinar clases según estilo
        if ($this->outlined) {
            $this->addClass("alert-outline-{$this->type}");
            $this->addClass("border border-{$this->type} bg-transparent text-{$this->type}");
        } elseif ($this->solid) {
            $this->addClass("bg-{$this->type} text-white border-0");
        } else {
            $this->addClass("alert-{$this->type}");
        }

        if ($this->dismissible) {
            $this->addClass('alert-dismissible fade show');
        }

        // Icono
        $iconHtml = '';
        if ($this->icon) {
            $iconHtml = "<i class='{$this->icon} me-2 fs-5'></i>";
        }

        // Título
        $titleHtml = '';
        if ($this->title) {
            $titleHtml = "<h5 class='alert-heading mb-1'>{$this->escape($this->title)}</h5>";
        }

        // Enlace
        $linkHtml = '';
        if ($this->link) {
            $linkClass = $this->solid ? 'alert-link text-white' : 'alert-link';
            $linkHtml = " <a href='{$this->link}' class='{$linkClass}'>{$this->escape($this->linkText)}</a>";
        }

        // Botones
        $buttonsHtml = '';
        if (!empty($this->buttons)) {
            $buttonsHtml = "<div class='mt-2'>";
            foreach ($this->buttons as $btn) {
                $btnClass = $this->solid ? "btn btn-light btn-sm me-2" : "btn btn-{$btn['style']} btn-sm me-2";
                $buttonsHtml .= "<a href='{$btn['url']}' class='{$btnClass}'>{$this->escape($btn['text'])}</a>";
            }
            $buttonsHtml .= "</div>";
        }

        // Botón de cerrar
        $closeBtn = '';
        if ($this->dismissible) {
            $closeBtnClass = $this->solid ? 'btn-close btn-close-white' : 'btn-close';
            $closeBtn = "<button type='button' class='{$closeBtnClass}' data-bs-dismiss='alert' aria-label='Cerrar'></button>";
        }

        return "
        <div {$this->buildAttributes()} role='alert'>
            {$titleHtml}
            <div class='d-flex align-items-center'>
                {$iconHtml}
                <span>{$this->message}{$linkHtml}</span>
            </div>
            {$buttonsHtml}
            {$closeBtn}
        </div>";
    }
}
