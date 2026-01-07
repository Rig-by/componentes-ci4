<?php

namespace App\Libraries\Components\Statistics;

use App\Libraries\Components\Base\BaseComponent;

class ComparisonCard extends BaseComponent
{
    public function render(array $data = []): string
    {
        $title = $data['title'] ?? 'Comparación';
        $currentValue = $data['current'] ?? '0';
        $previousValue = $data['previous'] ?? '0';
        $label = $data['label'] ?? 'vs período anterior';
        
        // Calcular el cambio porcentual
        $change = 0;
        if ($previousValue > 0) {
            $change = (($currentValue - $previousValue) / $previousValue) * 100;
        }
        
        $changeClass = $change >= 0 ? 'positive' : 'negative';
        $changeIcon = $change >= 0 ? '↑' : '↓';
        
        $html = '<div class="comparison-card">';
        $html .= '<h3 class="comparison-title">' . esc($title) . '</h3>';
        $html .= '<div class="comparison-values">';
        $html .= '<div class="comparison-current">' . esc($currentValue) . '</div>';
        $html .= '<div class="comparison-change ' . $changeClass . '">';
        $html .= '<span class="change-icon">' . $changeIcon . '</span>';
        $html .= '<span class="change-percent">' . number_format(abs($change), 1) . '%</span>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="comparison-label">' . esc($label) . '</div>';
        $html .= '<div class="comparison-previous">Anterior: ' . esc($previousValue) . '</div>';
        $html .= '</div>';
        
        return $html;
    }
}