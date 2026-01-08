<?php

namespace App\Libraries\Components\Display;

use App\Libraries\Components\Base\BaseComponent;

class Timeline extends BaseComponent
{
    protected $items = [];
    protected $title = '';

    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function addItem(array $item)
    {
        $this->items[] = $item;
        return $this;
    }

    public function render(array $data = []): string
    {
        // Si se pasa data por parámetro, usarlo (compatibilidad)
        $items = $data['items'] ?? $this->items;
        $title = $data['title'] ?? $this->title;
        
        $html = '<div class="timeline-component">';
        
        if ($title) {
            $html .= '<h3 class="timeline-title mb-4">' . esc($title) . '</h3>';
        }
        
        $html .= '<div class="timeline">';
        
        foreach ($items as $item) {
            $date = $item['date'] ?? '';
            $itemTitle = $item['title'] ?? '';
            $description = $item['description'] ?? '';
            $color = $item['color'] ?? 'primary';
            $icon = $item['icon'] ?? 'bi-circle-fill';
            
            $html .= '<div class="timeline-item mb-4">';
            $html .= '<div class="d-flex">';
            
            // Marker
            $html .= '<div class="timeline-marker me-3">';
            $html .= '<div class="bg-' . esc($color) . ' rounded-circle p-2 text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">';
            $html .= '<i class="' . esc($icon) . '"></i>';
            $html .= '</div>';
            $html .= '</div>';
            
            // Content
            $html .= '<div class="timeline-content flex-grow-1">';
            
            if ($date) {
                $html .= '<div class="text-muted small mb-1">' . esc($date) . '</div>';
            }
            
            if ($itemTitle) {
                $html .= '<h5 class="mb-2">' . esc($itemTitle) . '</h5>';
            }
            
            if ($description) {
                $html .= '<p class="text-muted mb-0">' . esc($description) . '</p>';
            }
            
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }

    public function __toString()
    {
        return $this->render();
    }
}