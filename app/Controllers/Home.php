<?php

namespace App\Controllers;

/**
 * Home Controller
 * 
 * Controlador principal del sistema de componentes
 * 
 * @author Rigoberto
 */
class Home extends BaseController
{
    /**
     * Página principal
     * 
     * @return string
     */
    public function index(): string
    {
        $data = [
            'title' => 'Sistema de Componentes PHP - CodeIgniter 4',
            'version' => '1.0.0',
            'team' => [
                'Rigoberto' => 'Base + Statistics',
                'Lizbeth' => 'Tablas',
                'Javier' => 'Layout',
                'Zulema' => 'Statistics Avanzado + Demo'
            ]
        ];

        return view('home', $data);
    }
}
