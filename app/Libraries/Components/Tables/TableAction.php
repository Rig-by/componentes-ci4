<?php

namespace App\Libraries\Components\Tables;

use App\Libraries\Components\Base\BaseComponent;

class TableAction extends BaseComponent
{
    protected $buttons = [];

    public function __construct()
    {
        parent::__construct();
        $this->addClass('btn-group btn-group-sm'); // Grupo de botones pequeño
    }

    public function addEdit(string $url)
    {
        $this->buttons[] = "<a href='{$url}' class='btn btn-primary' title='Editar'><i class='bi-pencil-fill'></i></a>";
        return $this;
    }

    public function addDelete(string $url)
    {
        // En un caso real, esto podría ser un form submit, pero para demo usamos link
        $this->buttons[] = "<a href='{$url}' class='btn btn-danger' onclick='return confirm(\"¿Seguro?\")' title='Eliminar'><i class='bi-trash-fill'></i></a>";
        return $this;
    }

    public function addCustom(string $html)
    {
        $this->buttons[] = $html;
        return $this;
    }

    public function render(): string
    {
        $content = implode('', $this->buttons);
        return "<div {$this->buildAttributes()} role='group'>{$content}</div>";
    }
}