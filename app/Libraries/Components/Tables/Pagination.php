<?php

namespace App\Libraries\Components\Tables;

use App\Libraries\Components\Base\BaseComponent;

class Pagination extends BaseComponent
{
    protected $currentPage;
    protected $totalPages;

    public function __construct(int $currentPage, int $totalPages)
    {
        parent::__construct();
        $this->currentPage = $currentPage;
        $this->totalPages = $totalPages;
    }

    public function render(): string
    {
        if ($this->totalPages <= 1) return '';

        $items = '';
        
        // Botón Anterior
        $prevDisabled = ($this->currentPage <= 1) ? 'disabled' : '';
        $items .= "<li class='page-item {$prevDisabled}'><a class='page-link' href='#'>Anterior</a></li>";

        // Números (Simplificado para demo)
        for ($i = 1; $i <= $this->totalPages; $i++) {
            $active = ($i == $this->currentPage) ? 'active' : '';
            $items .= "<li class='page-item {$active}'><a class='page-link' href='#'>{$i}</a></li>";
        }

        // Botón Siguiente
        $nextDisabled = ($this->currentPage >= $this->totalPages) ? 'disabled' : '';
        $items .= "<li class='page-item {$nextDisabled}'><a class='page-link' href='#'>Siguiente</a></li>";

        return "
        <nav aria-label='Navegación de tabla'>
            <ul class='pagination justify-content-end mb-0'>
                {$items}
            </ul>
        </nav>";
    }
}