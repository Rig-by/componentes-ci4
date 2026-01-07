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
        $data = [
            'title' => 'Demo de Componentes UI',
            'description' => 'Demostración de todos los componentes disponibles'
        ];
        
        return view('demo/index', $data);
    }
    
    public function statistics()
    {
        // Obtener datos de ejemplo
        $stats = $this->statsModel->getExampleStats();
        
        $data = [
            'title' => 'Componentes de Estadísticas',
            'stats' => $stats
        ];
        
        return view('demo/statistics', $data);
    }
    
    public function tables()
    {
        $data = [
            'title' => 'Componentes de Tablas'
        ];
        
        return view('demo/tables', $data);
    }
}