<?php

namespace App\Libraries\Components\Statistics;

use App\Libraries\Components\Base\BaseComponent;

class StatBadge extends BaseComponent
{
    protected $value = '0';
    protected $label = 'Stat';
    protected $color = 'primary';
    protected $icon = '';

    public function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }

    public function setLabel(string $label)
    {
        $this->label = $label;
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
        // Si se pasa data por parámetro, usarlo (compatibilidad con versión anterior)
        $value = $data['value'] ?? $this->value;
        $label = $data['label'] ?? $this->label;
        $color = $data['color'] ?? $this->color;
        $icon = $data['icon'] ?? $this->icon;
        
        $html = '<div class="stat-badge stat-badge-' . esc($color) . '">';
        
        if ($icon) {
            $html .= '<span class="stat-badge-icon"><i class="' . esc($icon) . '"></i></span>';
        }
        
        $html .= '<div class="stat-badge-content">';
        $html .= '<div class="stat-badge-value">' . esc($value) . '</div>';
        $html .= '<div class="stat-badge-label">' . esc($label) . '</div>';
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }

    public function __toString()
    {
        return $this->render();
    }
}