<?php

namespace App\Libraries\Components\Display;

use App\Libraries\Components\Base\BaseComponent;

class Timeline extends BaseComponent
{
    public function render(array $data = []): string
    {
        $items = $data['items'] ?? [];
        $title = $data['title'] ?? 'Timeline';
        
        $html = '<div class="timeline-component">';
        
        if ($title) {
            $html .= '<h3 class="timeline-title">' . esc($title) . '</h3>';
        }
        
        $html .= '<div class="timeline">';
        
        foreach ($items as $item) {
            $date = $item['date'] ?? '';
            $itemTitle = $item['title'] ?? '';
            $description = $item['description'] ?? '';
            $type = $item['type'] ?? 'default';
            
            $html .= '<div class="timeline-item timeline-' . esc($type) . '">';
            $html .= '<div class="timeline-marker"></div>';
            $html .= '<div class="timeline-content">';
            
            if ($date) {
                $html .= '<div class="timeline-date">' . esc($date) . '</div>';
            }
            
            if ($itemTitle) {
                $html .= '<h4 class="timeline-item-title">' . esc($itemTitle) . '</h4>';
            }
            
            if ($description) {
                $html .= '<p class="timeline-description">' . esc($description) . '</p>';
            }
            
            $html .= '</div>';
            $html .= '</div>';
        }
        
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }
}