<?php

namespace App\Libraries\Components\Statistics;

use App\Libraries\Components\Base\BaseComponent;

class ComparisonCard extends BaseComponent
{
    protected $title = 'Comparación';
    protected $value = '0';
    protected $comparison = '0%';
    protected $trend = 'up';
    protected $color = 'primary';
    protected $icon = '';

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

    public function setComparison(string $comparison)
    {
        $this->comparison = $comparison;
        return $this;
    }

    public function setTrend(string $trend)
    {
        $this->trend = $trend;
        return $this;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
        return $this;
    }

    public function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function render(array $data = []): string
    {
        // Si se pasa data por parámetro, usarlo (compatibilidad)
        $title = $data['title'] ?? $this->title;
        $value = $data['current'] ?? $this->value;
        $comparison = $data['comparison'] ?? $this->comparison;
        $trend = $data['trend'] ?? $this->trend;
        $color = $data['color'] ?? $this->color;
        $icon = $data['icon'] ?? $this->icon;
        
        $trendClass = $trend === 'up' ? 'text-success' : 'text-danger';
        $trendIcon = $trend === 'up' ? 'bi-arrow-up' : 'bi-arrow-down';
        
        $html = '<div class="card border-' . esc($color) . '">';
        $html .= '<div class="card-body">';
        
        if ($icon) {
            $html .= '<div class="mb-2"><i class="' . esc($icon) . ' text-' . esc($color) . ' fs-3"></i></div>';
        }
        
        $html .= '<h6 class="card-subtitle mb-2 text-muted">' . esc($title) . '</h6>';
        $html .= '<h3 class="card-title mb-1">' . esc($value) . '</h3>';
        $html .= '<div class="' . $trendClass . '">';
        $html .= '<i class="' . $trendIcon . '"></i> ';
        $html .= '<span>' . esc($comparison) . '</span>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }

    public function __toString()
    {
        return $this->render();
    }
}