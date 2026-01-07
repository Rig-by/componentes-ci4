<?php

namespace App\Controllers;

class DemoController extends BaseController
{
    public function index()
    {
        // Carga el helper de URL para que funcionen base_url() y los estilos
        helper('url');

        // Carga la vista que está en la carpeta 'demo'
        return view('demo/index');
    }

    public function layout()
    {
        // Carga el helper de URL para que funcionen base_url() y los estilos
        helper('url');

        // Carga la vista de demo de componentes Layout (Javier)
        return view('demo/layout');
    }
}