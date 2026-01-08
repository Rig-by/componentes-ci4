<?php

namespace App\Libraries\Components\Statistics;

use App\Libraries\Components\Base\BaseComponent;

class MetricCard extends BaseComponent
{
    protected $label = '';
    protected $amount = '';
    protected $trendHtml = ''; // Para mostrar ↑ 5% o similar

    public function __construct()
    {
        parent::__construct();
        $this->addClass('card text-center mb-3');
    }

    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    public function setAmount(string $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function setTrend(string $text, string $color = 'success')
    {
        // Pequeño badge o texto de tendencia
        $this->trendHtml = "<small class='text-{$color} fw-bold'>{$text}</small>";
        return $this;
    }

    public function render(): string
    {
        return "
        <div {$this->buildAttributes()}>
            <div class='card-body py-4'>
                <div class='h1 mb-1'>{$this->escape($this->amount)}</div>
                <div class='text-muted'>{$this->escape($this->label)}</div>
                <div class='mt-2'>{$this->trendHtml}</div>
            </div>
        </div>";
    }
}