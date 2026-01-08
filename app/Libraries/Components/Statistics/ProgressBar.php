<?php

namespace App\Libraries\Components\Statistics;

use App\Libraries\Components\Base\BaseComponent;

class ProgressBar extends BaseComponent
{
    protected $percent = 0;
    protected $color = 'primary';
    protected $label = '';
    protected $striped = false;

    public function __construct()
    {
        parent::__construct();
        // El contenedor externo NO es la barra, es el wrapper
        // Usamos addClass en el contenedor externo
        $this->addClass('progress'); 
        $this->addStyle('height', '10px'); // Altura por defecto delgada y elegante
    }

    public function setPercent(int $percent)
    {
        $this->percent = min(100, max(0, $percent));
        return $this;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
        return $this;
    }

    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    public function isStriped(bool $striped = true)
    {
        $this->striped = $striped;
        return $this;
    }

    public function render(): string
    {
        // Clases para la barra interna
        $barClasses = "progress-bar bg-{$this->color}";
        if ($this->striped) {
            $barClasses .= " progress-bar-striped progress-bar-animated";
        }

        $header = '';
        if ($this->label) {
            // Si hay etiqueta, la ponemos encima de la barra
            $header = "<div class='d-flex justify-content-between mb-1'>
                        <span class='fw-bold small'>{$this->escape($this->label)}</span>
                        <span class='small'>{$this->percent}%</span>
                       </div>";
        }

        return "
        <div>
            {$header}
            <div {$this->buildAttributes()}>
                <div class='{$barClasses}' role='progressbar' 
                     style='width: {$this->percent}%' 
                     aria-valuenow='{$this->percent}' aria-valuemin='0' aria-valuemax='100'>
                </div>
            </div>
        </div>";
    }
}