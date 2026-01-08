<!DOCTYPE html>
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
                                   ->addClass('shadow-sm') //
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

                    <div class="mt-4">
                        <h3 class="h4 mb-3">Usuarios del Sistema</h3>
                        
                        <?php
                            // 1. Datos simulados (Mock Data)
                            $usuarios = [
                                ['id' => 101, 'name' => 'Rigoberto Admin', 'role' => 'Administrador', 'status' => 'active'],
                                ['id' => 102, 'name' => 'Lizbeth Dev', 'role' => 'Desarrollador', 'status' => 'active'],
                                ['id' => 103, 'name' => 'Javier UI', 'role' => 'Diseñador', 'status' => 'pending'],
                                ['id' => 104, 'name' => 'Zulema QA', 'role' => 'Tester', 'status' => 'inactive'],
                            ];

                            // 2. Componente Smart Table
                            echo $ui->smartTable()
                                ->addColumn('id', '#', function($val) {
                                    return "<span class='text-muted'>{$val}</span>";
                                })
                                ->addColumn('name', 'Usuario', function($val, $row) {
                                    // Podemos combinar datos de la fila
                                    return "<div>
                                                <span class='fw-bold text-dark'>{$val}</span>
                                                <div class='small text-muted'>{$row['role']}</div>
                                            </div>";
                                })
                                ->addColumn('status', 'Estado', function($val) {
                                    // Lógica de presentación encapsulada
                                    $map = [
                                        'active'  => ['color' => 'success', 'label' => 'Activo'],
                                        'pending' => ['color' => 'warning', 'label' => 'Revisión'],
                                        'inactive'=> ['color' => 'danger',  'label' => 'Baja']
                                    ];
                                    $info = $map[$val] ?? ['color' => 'secondary', 'label' => $val];
                                    return "<span class='badge bg-{$info['color']}'>{$info['label']}</span>";
                                })
                                ->addColumn('actions', 'Opciones', function($val, $row) {
                                    // Componente de Botones
                                    return (new \App\Libraries\Components\Tables\TableAction())
                                        ->addEdit("#/edit/{$row['id']}")
                                        ->addDelete("#/delete/{$row['id']}")
                                        ->render();
                                })
                                ->setData($usuarios)
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

</body>
</html>