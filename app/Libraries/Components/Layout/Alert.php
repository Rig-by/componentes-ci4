<?php

namespace App\Libraries\Components\Layout;

use App\Libraries\Components\Base\BaseComponent;

/**
 * Alert Component
 * 
 * Componente de alerta/notificación con diferentes tipos y opciones.
 * 
 * @author Javier
 * @package App\Libraries\Components\Layout
 */
class Alert extends BaseComponent
{
    protected string $message = '';
    protected string $title = '';
    protected string $type = 'info'; // primary, secondary, success, danger, warning, info, light, dark
    protected string $icon = '';
    protected bool $dismissible = false;
    protected bool $outlined = false;

    public function __construct()
    {
        parent::__construct();
        $this->addClass('alert');
    }

    // --- Setters para configuración fluida ---

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    public function dismissible(bool $dismissible = true): self
    {
        $this->dismissible = $dismissible;
        return $this;
    }

    public function outlined(bool $outlined = true): self
    {
        $this->outlined = $outlined;
        return $this;
    }

    // --- Métodos de conveniencia para tipos comunes ---

    public function success(string $message): self
    {
        $this->type = 'success';
        $this->message = $message;
        $this->icon = 'bi-check-circle-fill';
        return $this;
    }

    public function danger(string $message): self
    {
        $this->type = 'danger';
        $this->message = $message;
        $this->icon = 'bi-exclamation-triangle-fill';
        return $this;
    }

    public function warning(string $message): self
    {
        $this->type = 'warning';
        $this->message = $message;
        $this->icon = 'bi-exclamation-circle-fill';
        return $this;
    }

    public function info(string $message): self
    {
        $this->type = 'info';
        $this->message = $message;
        $this->icon = 'bi-info-circle-fill';
        return $this;
    }

    // --- Renderizado ---

    public function render(): string
    {
        // Agregar clases según configuración
        if ($this->outlined) {
            $this->addClass("alert-outline-{$this->type}");
        } else {
            $this->addClass("alert-{$this->type}");
        }

        if ($this->dismissible) {
            $this->addClass('alert-dismissible fade show');
        }

        // Icono
        $iconHtml = '';
        if ($this->icon) {
            $iconHtml = "<i class='{$this->icon} me-2'></i>";
        }

        // Título
        $titleHtml = '';
        if ($this->title) {
            $titleHtml = "<h5 class='alert-heading'>{$this->escape($this->title)}</h5>";
        }

        // Botón de cerrar
        $closeBtn = '';
        if ($this->dismissible) {
            $closeBtn = "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Cerrar'></button>";
        }

        return "
        <div {$this->buildAttributes()} role='alert'>
            {$titleHtml}
            <div class='d-flex align-items-center'>
                {$iconHtml}
                <span>{$this->message}</span>
            </div>
            {$closeBtn}
        </div>";
    }
}
