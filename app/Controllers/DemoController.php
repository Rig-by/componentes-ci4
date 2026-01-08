<?php

namespace App\Controllers;

use App\Libraries\UiComponents;
use App\Models\StatsModel;

class DemoController extends BaseController
{
    protected $ui;
    protected $statsModel;
    
    public function __construct()
    {
        $this->ui = new UiComponents();
        $this->statsModel = new StatsModel();
    }
    
    public function index()
    {
        // Mantenemos la lógica de tus compañeros pero con tus variables
        helper('url');
        $data = [
            'title' => 'Demo de Componentes UI',
            'description' => 'Demostración de todos los componentes disponibles'
        ];
        
        return view('demo/index', $data);
    }
    
    public function statistics()
    {
        $stats = $this->statsModel->getExampleStats();
        $data = [
            'title' => 'Componentes de Estadísticas',
            'stats' => $stats
        ];
        
        return view('demo/statistics', $data);
    }
    
    public function tables()
    {
        $data = ['title' => 'Componentes de Tablas'];
        return view('demo/tables', $data);
    }

    // Esta es la función de tus compañeros (Javier), ¡no la borres!
    public function layout()
    {
        helper('url');
        return view('demo/layout');
    }
}