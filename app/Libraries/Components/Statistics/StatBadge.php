<?php

namespace App\Libraries\Components\Statistics;

use App\Libraries\Components\Base\BaseComponent;

class StatBadge extends BaseComponent
{
    public function render(array $data = []): string
    {
        $value = $data['value'] ?? '0';
        $label = $data['label'] ?? 'Stat';
        $color = $data['color'] ?? 'primary';
        $icon = $data['icon'] ?? '';
        
        $html = '<div class="stat-badge stat-badge-' . esc($color) . '">';
        
        if ($icon) {
            $html .= '<span class="stat-badge-icon">' . $icon . '</span>';
        }
        
        $html .= '<div class="stat-badge-content">';
        $html .= '<div class="stat-badge-value">' . esc($value) . '</div>';
        $html .= '<div class="stat-badge-label">' . esc($label) . '</div>';
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }
}