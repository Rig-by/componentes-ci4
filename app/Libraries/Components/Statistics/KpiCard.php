<?php

namespace App\Libraries\Components\Statistics;

use App\Libraries\Components\Base\BaseComponent;

class KpiCard extends BaseComponent
{
    protected $title = '';
    protected $value = '';
    protected $icon = '';
    protected $color = 'primary'; // primary, success, warning, danger, info, dark

    public function __construct()
    {
        parent::__construct();
        $this->addClass('card mb-3'); // Clase base de Nifty
    }

    // --- Setters para configuración fluida ---

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }

    public function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
        return $this;
    }

    // --- Renderizado ---

    public function render(): string
    {
        // Icono con estilo Nifty (fondo suave redondeado)
        $iconHtml = '';
        if ($this->icon) {
            $iconHtml = "
            <div class='flex-shrink-0'>
                <div class='p-3 bg-{$this->color} bg-opacity-10 text-{$this->color} rounded-3'>
                    <i class='{$this->icon} fs-2'></i>
                </div>
            </div>";
        }

        return "
        <div {$this->buildAttributes()}>
            <div class='card-body d-flex align-items-center'>
                {$iconHtml}
                <div class='flex-grow-1 ms-3'>
                    <h5 class='h2 mb-0'>{$this->escape($this->value)}</h5>
                    <p class='text-body-secondary mb-0'>{$this->escape($this->title)}</p>
                </div>
            </div>
        </div>";
    }
}