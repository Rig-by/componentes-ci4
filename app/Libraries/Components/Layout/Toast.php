<?php

namespace App\Libraries\Components\Layout;

use App\Libraries\Components\Base\BaseComponent;

/**
 * Toast
 * Componente de notificación temporal que aparece y desaparece.
 * Se muestra en una esquina de la pantalla con animación.
 * 
 * @author Javier
 * @package App\Libraries\Components\Layout
 */
class Toast extends BaseComponent
{
    protected $message = '';
    protected $title = '';
    protected $type = 'info';       // primary, success, danger, warning, info
    protected $icon = '';
    protected $position = 'top-end'; // top-start, top-center, top-end, bottom-start, bottom-center, bottom-end
    protected $autohide = true;
    protected $delay = 5000;         // Milisegundos antes de ocultarse
    protected $showNow = true;       // Si debe mostrarse automáticamente

    public function __construct()
    {
        parent::__construct();
        $this->addClass('toast');
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

    /**
     * Posición: top-start, top-center, top-end, bottom-start, bottom-center, bottom-end
     */
    public function setPosition(string $position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Tiempo en milisegundos antes de ocultarse (default: 5000)
     */
    public function setDelay(int $delay)
    {
        $this->delay = $delay;
        return $this;
    }

    /**
     * Desactiva el auto-hide (el toast permanece hasta cerrarlo)
     */
    public function persistent()
    {
        $this->autohide = false;
        return $this;
    }

    // --- Métodos de conveniencia ---

    public function success(string $message)
    {
        $this->type = 'success';
        $this->message = $message;
        $this->icon = 'bi-check-circle-fill';
        $this->title = 'Éxito';
        return $this;
    }

    public function danger(string $message)
    {
        $this->type = 'danger';
        $this->message = $message;
        $this->icon = 'bi-exclamation-triangle-fill';
        $this->title = 'Error';
        return $this;
    }

    public function warning(string $message)
    {
        $this->type = 'warning';
        $this->message = $message;
        $this->icon = 'bi-exclamation-circle-fill';
        $this->title = 'Advertencia';
        return $this;
    }

    public function info(string $message)
    {
        $this->type = 'info';
        $this->message = $message;
        $this->icon = 'bi-info-circle-fill';
        $this->title = 'Información';
        return $this;
    }

    // --- Renderizado ---

    public function render(): string
    {
        // Atributos de Bootstrap Toast
        $this->setAttribute('role', 'alert');
        $this->setAttribute('aria-live', 'assertive');
        $this->setAttribute('aria-atomic', 'true');

        if ($this->autohide) {
            $this->setAttribute('data-bs-autohide', 'true');
            $this->setAttribute('data-bs-delay', (string) $this->delay);
        } else {
            $this->setAttribute('data-bs-autohide', 'false');
        }

        // Icono
        $iconHtml = '';
        if ($this->icon) {
            $iconHtml = "<i class='{$this->icon} me-2 text-{$this->type}'></i>";
        }

        // Título con hora
        $titleHtml = $this->title ?: 'Notificación';

        // Determinar posición CSS
        $positionClass = $this->getPositionClass();

        return "
        <div class='toast-container position-fixed {$positionClass} p-3'>
            <div {$this->buildAttributes()}>
                <div class='toast-header'>
                    {$iconHtml}
                    <strong class='me-auto'>{$this->escape($titleHtml)}</strong>
                    <small class='text-muted'>Ahora</small>
                    <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Cerrar'></button>
                </div>
                <div class='toast-body'>
                    {$this->message}
                </div>
            </div>
        </div>
        <script>
            (function() {
                var toastEl = document.getElementById('{$this->id}');
                if (toastEl) {
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                }
            })();
        </script>";
    }

    /**
     * Convierte la posición a clases CSS de Bootstrap
     */
    protected function getPositionClass(): string
    {
        $map = [
            'top-start' => 'top-0 start-0',
            'top-center' => 'top-0 start-50 translate-middle-x',
            'top-end' => 'top-0 end-0',
            'bottom-start' => 'bottom-0 start-0',
            'bottom-center' => 'bottom-0 start-50 translate-middle-x',
            'bottom-end' => 'bottom-0 end-0',
        ];
        return $map[$this->position] ?? 'top-0 end-0';
    }
}
