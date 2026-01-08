<?php

namespace App\Models;

use CodeIgniter\Model;

class StatsModel extends Model
{
    protected $table = 'statistics';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'value', 'date'];
    
    /**
     * Obtiene estadísticas de ejemplo para la demo
     */
    public function getExampleStats(): array
    {
        return [
            'badges' => [
                [
                    'value' => '1,234',
                    'label' => 'Usuarios Activos',
                    'color' => 'primary',
                    'icon' => '👥'
                ],
                [
                    'value' => '5,678',
                    'label' => 'Ventas Totales',
                    'color' => 'success',
                    'icon' => '💰'
                ],
                [
                    'value' => '89%',
                    'label' => 'Satisfacción',
                    'color' => 'info',
                    'icon' => '⭐'
                ]
            ],
            'comparisons' => [
                [
                    'title' => 'Ventas Mensuales',
                    'current' => 45000,
                    'previous' => 38000,
                    'label' => 'vs mes anterior'
                ],
                [
                    'title' => 'Nuevos Usuarios',
                    'current' => 320,
                    'previous' => 280,
                    'label' => 'vs mes anterior'
                ]
            ],
            'timeline' => [
                'title' => 'Actividad Reciente',
                'items' => [
                    [
                        'date' => '2025-01-05',
                        'title' => 'Nueva venta registrada',
                        'description' => 'Venta de $500 procesada exitosamente',
                        'type' => 'success'
                    ],
                    [
                        'date' => '2025-01-04',
                        'title' => 'Usuario registrado',
                        'description' => 'Nuevo usuario se unió a la plataforma',
                        'type' => 'info'
                    ],
                    [
                        'date' => '2025-01-03',
                        'title' => 'Actualización del sistema',
                        'description' => 'Sistema actualizado a la versión 2.0',
                        'type' => 'warning'
                    ]
                ]
            ]
        ];
    }
}