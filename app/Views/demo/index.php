<html lang="es" data-bs-theme="light" data-scheme="navy">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Nifty CodeIgniter 4</title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/nifty.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body class="out-quart">

    <?php $ui = new \App\Libraries\UiComponents(); ?>

    <div id="root" class="root mn--max">

        <section id="content" class="content">

            <div class="content__header content__boxed border-bottom overlapping">
                <div class="content__wrap mt-1 pt-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h1 class="page-title mb-2">Panel de Control</h1>
                    <p class="lead">Generado 100% con librerías PHP (Rigoberto & Lizbeth).</p>
                </div>
            </div>

            <div class="content__boxed">
                <div class="content__wrap">

                    <!-- ============================================ -->
                    <!-- KPIs -->
                    <!-- ============================================ -->

                    <div class="row">
                        <div class="col-md-3">
                            <?= $ui->kpiCard('Ingresos Totales', '$54,200', 'bi-currency-dollar', 'success') ?>
                        </div>
                        <div class="col-md-3">
                            <?= $ui->kpiCard('Usuarios Nuevos', '1,450', 'bi-people-fill', 'primary') ?>
                        </div>
                        <div class="col-md-3">
                            <?= $ui->kpiCard('Tareas Activas', '34', 'bi-list-check', 'warning') ?>
                        </div>
                        <div class="col-md-3">
                            <?= $ui->kpiCard()
                                ->setTitle('Alertas Críticas')
                                ->setValue('5')
                                ->setIcon('bi-shield-exclamation')
                                ->setColor('danger')
                                ->addClass('shadow-sm')
                                ->render()
                                ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Cumplimiento de Metas</h5>
                                    <?= $ui->progressBar(85, 'info', 'Ventas Anuales') ?>
                                    <div class="mb-3"></div>
                                    <?= $ui->progressBar(42, 'purple', 'Retención de Clientes') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 d-flex align-items-center justify-content-center bg-light">
                                <p class="text-muted">Espacio para Gráficos (Próximamente)</p>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================ -->
                    <!-- TABLA DE USUARIOS -->
                    <!-- ============================================ -->

                    <div class="mt-4">
                        <h3 class="h4 mb-3">Usuarios del Sistema</h3>
                        <?php
                        $usuarios = [
                            ['id' => 101, 'name' => 'Rigoberto Admin', 'role' => 'Administrador', 'status' => 'active'],
                            ['id' => 102, 'name' => 'Lizbeth Dev', 'role' => 'Desarrollador', 'status' => 'active'],
                            ['id' => 103, 'name' => 'Javier UI', 'role' => 'Diseñador', 'status' => 'pending'],
                            ['id' => 104, 'name' => 'Zulema QA', 'role' => 'Tester', 'status' => 'inactive'],
                        ];

                        echo $ui->smartTable()
                            ->addColumn('id', '#', function ($val) {
                                return "<span class='text-muted'>{$val}</span>";
                            })
                            ->addColumn('name', 'Usuario', function ($val, $row) {
                                return "<div>
                                    <span class='fw-bold text-dark'>{$val}</span>
                                    <div class='small text-muted'>{$row['role']}</div>
                                </div>";
                            })
                            ->addColumn('status', 'Estado', function ($val) {
                                $map = [
                                    'active' => ['color' => 'success', 'label' => 'Activo'],
                                    'pending' => ['color' => 'warning', 'label' => 'Revisión'],
                                    'inactive' => ['color' => 'danger', 'label' => 'Baja']
                                ];
                                $info = $map[$val] ?? ['color' => 'secondary', 'label' => $val];
                                return "<span class='badge bg-{$info['color']}'>{$info['label']}</span>";
                            })
                            ->addColumn('actions', 'Opciones', function ($val, $row) {
                                return (new \App\Libraries\Components\Tables\TableAction())
                                    ->addEdit("#/edit/{$row['id']}")
                                    ->addDelete("#/delete/{$row['id']}")
                                    ->render();
                            })
                            ->setData($usuarios)
                            ->render();
                        ?>
                    </div>

                    <!-- ============================================ -->
                    <!-- ALERTAS -->
                    <!-- ============================================ -->

                    <div class="mt-5">
                        <h3 class="h4 mb-3"><i class="bi bi-bell me-2"></i>Componente Alert</h3>

                        <?= $ui->alert()->success('¡Operación completada exitosamente!') ?>
                        <?= $ui->alert()->warning('Advertencia: Revisa los datos antes de continuar.') ?>
                        <?= $ui->alert()->danger('Error: No se pudo procesar la solicitud.')->isDismissible() ?>
                    </div>

                    <!-- ============================================ -->
                    <!-- CARDS -->
                    <!-- ============================================ -->

                    <div class="mt-4">
                        <h3 class="h4 mb-3"><i class="bi bi-card-heading me-2"></i>Componente Card</h3>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <?= $ui->card('Card Básica', '<p class="mb-0">Contenido simple.</p>') ?>
                            </div>
                            <div class="col-md-4">
                                <?= $ui->card()
                                    ->setTitle('Con Icono')
                                    ->setIcon('bi bi-star-fill')
                                    ->setContent('<p class="mb-0">Card con icono.</p>')
                                    ->primary()
                                    ?>
                            </div>
                            <div class="col-md-4">
                                <?= $ui->card()
                                    ->setTitle('Header con Fondo')
                                    ->setContent('<p class="mb-0">Header sólido.</p>')
                                    ->success()
                                    ->headerWithBg()
                                    ->render()
                                    ?>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================ -->
                    <!-- PANELS -->
                    <!-- ============================================ -->

                    <div class="mt-4">
                        <h3 class="h4 mb-3"><i class="bi bi-layout-text-window me-2"></i>Componente Panel</h3>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <?= $ui->panel('Panel Básico', '<p>Panel para agrupar contenido.</p>') ?>
                            </div>
                            <div class="col-md-6">
                                <?= $ui->panel()
                                    ->setTitle('Panel Colapsable')
                                    ->setIcon('bi bi-arrows-collapse')
                                    ->setContent('<p>Clic en el título para colapsar.</p>')
                                    ->isCollapsible()
                                    ->render()
                                    ?>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================ -->
                    <!-- GRID -->
                    <!-- ============================================ -->

                    <div class="mt-4">
                        <h3 class="h4 mb-3"><i class="bi bi-grid-3x3 me-2"></i>Componente Grid</h3>

                        <?= $ui->grid(4)
                            ->setGap(2)
                            ->addItem('<div class="bg-primary text-white p-3 rounded text-center">Col 1</div>')
                            ->addItem('<div class="bg-success text-white p-3 rounded text-center">Col 2</div>')
                            ->addItem('<div class="bg-warning text-dark p-3 rounded text-center">Col 3</div>')
                            ->addItem('<div class="bg-danger text-white p-3 rounded text-center">Col 4</div>')
                            ->render()
                            ?>
                    </div>

                    <!-- ============================================ -->
                    <!-- TOASTS -->
                    <!-- ============================================ -->

                    <div class="mt-4">
                        <h3 class="h4 mb-3"><i class="bi bi-app-indicator me-2"></i>Componente Toast</h3>
                        <p class="text-muted mb-3">Notificaciones temporales que aparecen y desaparecen.</p>
                        
                        <button type="button" class="btn btn-success btn-sm me-2" onclick="showToast('success')">
                            <i class="bi bi-check-circle me-1"></i>Toast Success
                        </button>
                        <button type="button" class="btn btn-danger btn-sm me-2" onclick="showToast('danger')">
                            <i class="bi bi-exclamation-triangle me-1"></i>Toast Error
                        </button>
                        <button type="button" class="btn btn-warning btn-sm me-2" onclick="showToast('warning')">
                            <i class="bi bi-exclamation-circle me-1"></i>Toast Warning
                        </button>
                        <button type="button" class="btn btn-info btn-sm" onclick="showToast('info')">
                            <i class="bi bi-info-circle me-1"></i>Toast Info
                        </button>
                        
                        <!-- Contenedor de Toasts -->
                        <div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer"></div>
                    </div>

                    <!-- ============================================ -->
                    <!-- STAT BADGE -->
                    <!-- ============================================ -->

                    <div class="mt-4">
                        <h3 class="h4 mb-3"><i class="bi bi-award me-2"></i>Componente StatBadge</h3>

                        <div class="row g-3">
                            <div class="col-md-3">
                                <?= $ui->statBadge('Conversión', '24.5%', 'success') ?>
                            </div>
                            <div class="col-md-3">
                                <?= $ui->statBadge('Rebote', '32%', 'danger') ?>
                            </div>
                            <div class="col-md-3">
                                <?= $ui->statBadge('CTR', '4.8%', 'info') ?>
                            </div>
                            <div class="col-md-3">
                                <?= $ui->statBadge()
                                    ->setLabel('ROI')
                                    ->setValue('156%')
                                    ->setColor('warning')
                                    ->render()
                                    ?>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================ -->
                    <!-- COMPARISON CARD -->
                    <!-- ============================================ -->

                    <div class="mt-4">
                        <h3 class="h4 mb-3"><i class="bi bi-bar-chart me-2"></i>Componente ComparisonCard</h3>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <?= $ui->comparisonCard('Ventas', '$125,400', '+12.5%', 'up', 'success') ?>
                            </div>
                            <div class="col-md-4">
                                <?= $ui->comparisonCard('Tráfico', '45,230', '-3.2%', 'down', 'danger') ?>
                            </div>
                            <div class="col-md-4">
                                <?= $ui->comparisonCard()
                                    ->setTitle('Engagement')
                                    ->setValue('8,945')
                                    ->setComparison('+18.7%')
                                    ->setTrend('up')
                                    ->setColor('primary')
                                    ->render()
                                    ?>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================ -->
                    <!-- TIMELINE -->
                    <!-- ============================================ -->

                    <div class="mt-4">
                        <h3 class="h4 mb-3"><i class="bi bi-clock-history me-2"></i>Componente Timeline</h3>

                        <?php
                        $eventos = [
                            [
                                'title' => 'Proyecto Iniciado',
                                'description' => 'Se dio inicio al desarrollo del sistema.',
                                'date' => '15 Dic 2024',
                                'icon' => 'bi-flag-fill',
                                'color' => 'success'
                            ],
                            [
                                'title' => 'Primera Release',
                                'description' => 'Se publicó la versión 1.0 del sistema.',
                                'date' => '28 Dic 2024',
                                'icon' => 'bi-rocket-takeoff-fill',
                                'color' => 'primary'
                            ],
                            [
                                'title' => 'Actualización v1.5',
                                'description' => 'Nuevos componentes agregados al sistema.',
                                'date' => '08 Ene 2025',
                                'icon' => 'bi-star-fill',
                                'color' => 'warning'
                            ]
                        ];

                        echo $ui->timeline()
                            ->setItems($eventos)
                            ->render();
                        ?>
                    </div>

                </div>
            </div>

            <footer class="mt-auto border-top">
                <div class="content__boxed">
                    <div class="content__wrap py-3">
                        <div class="text-center text-muted small">
                            &copy; 2025 Sistema de Componentes v1.0
                        </div>
                    </div>
                </div>
            </footer>

        </section>
    </div>

    <script src="<?= base_url('assets/vendors/popperjs/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/bootstrap/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/nifty.min.js') ?>"></script>
    
    <script>
    function showToast(type) {
        const config = {
            success: { title: 'Éxito', message: '¡Operación completada!', icon: 'bi-check-circle-fill', color: 'success' },
            danger: { title: 'Error', message: 'No se pudo procesar la solicitud.', icon: 'bi-exclamation-triangle-fill', color: 'danger' },
            warning: { title: 'Advertencia', message: 'Revisa los datos antes de continuar.', icon: 'bi-exclamation-circle-fill', color: 'warning' },
            info: { title: 'Información', message: 'Nueva actualización disponible.', icon: 'bi-info-circle-fill', color: 'info' }
        };
        
        const c = config[type] || config.info;
        const id = 'toast-' + Date.now();
        
        const html = `
            <div id="${id}" class="toast" role="alert" data-bs-autohide="true" data-bs-delay="5000">
                <div class="toast-header">
                    <i class="${c.icon} me-2 text-${c.color}"></i>
                    <strong class="me-auto">${c.title}</strong>
                    <small class="text-muted">Ahora</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">${c.message}</div>
            </div>
        `;
        
        document.getElementById('toastContainer').insertAdjacentHTML('beforeend', html);
        const toastEl = document.getElementById(id);
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
        
        toastEl.addEventListener('hidden.bs.toast', () => toastEl.remove());
    }
    </script>

</body>

</html>