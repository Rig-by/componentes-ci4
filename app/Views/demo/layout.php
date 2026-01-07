<!DOCTYPE html>
<html lang="es" data-bs-theme="light" data-scheme="navy">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Layout Components | Javier</title>

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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('demo') ?>">Demo</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Layout Components</li>
                        </ol>
                    </nav>
                    <h1 class="page-title mb-2">Componentes de Layout</h1>
                    <p class="lead">Demostración de Card, Alert, Panel y Grid - Desarrollado por Javier</p>
                </div>
            </div>

            <div class="content__boxed">
                <div class="content__wrap">

                    <!-- ============================================ -->
                    <!-- SECCIÓN: ALERTS -->
                    <!-- ============================================ -->
                    <h3 class="h4 mb-3 mt-4"><i class="bi bi-bell me-2"></i>Componente Alert</h3>

                    <div class="mb-4">
                        <!-- Alert básico -->
                        <?= $ui->alert('Este es un mensaje informativo básico.', 'info') ?>

                        <!-- Alert con método de conveniencia -->
                        <?= $ui->alert()->success('¡Operación completada exitosamente!') ?>

                        <?= $ui->alert()->warning('Advertencia: Revisa los datos antes de continuar.') ?>

                        <?= $ui->alert()->danger('Error: No se pudo procesar la solicitud.') ?>

                        <!-- Alert dismissible con título -->
                        <?= $ui->alert()
                            ->setTitle('Notificación Importante')
                            ->setMessage('Esta alerta puede cerrarse haciendo clic en la X.')
                            ->setType('primary')
                            ->setIcon('bi bi-megaphone-fill')
                            ->dismissible()
                            ->render()
                            ?>
                    </div>

                    <!-- ============================================ -->
                    <!-- SECCIÓN: CARDS -->
                    <!-- ============================================ -->
                    <h3 class="h4 mb-3 mt-5"><i class="bi bi-card-heading me-2"></i>Componente Card</h3>

                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <!-- Card básica -->
                            <?= $ui->card('Card Básica', '<p>Esta es una tarjeta simple con título y contenido.</p>') ?>
                        </div>

                        <div class="col-md-4">
                            <!-- Card con icono y variant -->
                            <?= $ui->card()
                                ->setTitle('Card con Icono')
                                ->setHeaderIcon('bi bi-star-fill')
                                ->setContent('<p>Tarjeta con icono en el header y estilo primary.</p>')
                                ->setVariant('primary')
                                ->render()
                                ?>
                        </div>

                        <div class="col-md-4">
                            <!-- Card con footer y shadow -->
                            <?= $ui->card()
                                ->setTitle('Card Completa')
                                ->setSubtitle('Con subtítulo')
                                ->setHeaderIcon('bi bi-gear')
                                ->setContent('<p>Esta tarjeta tiene header, body, footer y sombra.</p>')
                                ->setFooter('<button class="btn btn-sm btn-primary">Acción</button>')
                                ->withShadow()
                                ->render()
                                ?>
                        </div>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <!-- Card colapsable -->
                            <?= $ui->card()
                                ->setTitle('Card Colapsable')
                                ->setHeaderIcon('bi bi-arrows-collapse')
                                ->setContent('
                                    <p>Esta tarjeta puede expandirse y contraerse.</p>
                                    <p>Haz clic en el icono de flecha en el header para probarlo.</p>
                                ')
                                ->collapsible(true, false)
                                ->setVariant('info')
                                ->render()
                                ?>
                        </div>

                        <div class="col-md-6">
                            <!-- Card con diferentes variantes -->
                            <?= $ui->card()
                                ->setTitle('Card Success')
                                ->setContent('<p>Tarjeta con estilo de éxito para mensajes positivos.</p>')
                                ->setVariant('success')
                                ->withShadow()
                                ->render()
                                ?>
                        </div>
                    </div>

                    <!-- ============================================ -->
                    <!-- SECCIÓN: PANELS -->
                    <!-- ============================================ -->
                    <h3 class="h4 mb-3 mt-5"><i class="bi bi-layout-text-window me-2"></i>Componente Panel</h3>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <?= $ui->panel('Panel Básico', '<p>Panel simple para agrupar contenido relacionado.</p>') ?>
                        </div>

                        <div class="col-md-6">
                            <?= $ui->panel()
                                ->setTitle('Panel con Icono')
                                ->setIcon('bi bi-folder')
                                ->setContent('<p>Panel con icono y borde personalizado.</p>')
                                ->setVariant('white')
                                ->render()
                                ?>
                        </div>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <?= $ui->panel()
                                ->setTitle('Padding Small')
                                ->setContent('Contenido compacto')
                                ->setPadding('small')
                                ->render()
                                ?>
                        </div>
                        <div class="col-md-4">
                            <?= $ui->panel()
                                ->setTitle('Padding Normal')
                                ->setContent('Contenido normal')
                                ->render()
                                ?>
                        </div>
                        <div class="col-md-4">
                            <?= $ui->panel()
                                ->setTitle('Padding Large')
                                ->setContent('Contenido espacioso')
                                ->setPadding('large')
                                ->render()
                                ?>
                        </div>
                    </div>

                    <!-- ============================================ -->
                    <!-- SECCIÓN: GRID -->
                    <!-- ============================================ -->
                    <h3 class="h4 mb-3 mt-5"><i class="bi bi-grid-3x3 me-2"></i>Componente Grid</h3>

                    <h5 class="text-muted mb-3">Grid de 3 columnas (default)</h5>
                    <?= $ui->grid(3)
                        ->addItem($ui->card('Item 1', 'Contenido del primer item')->render())
                        ->addItem($ui->card('Item 2', 'Contenido del segundo item')->render())
                        ->addItem($ui->card('Item 3', 'Contenido del tercer item')->render())
                        ->render()
                        ?>

                    <h5 class="text-muted mb-3 mt-4">Grid de 4 columnas</h5>
                    <?= $ui->grid()
                        ->fourColumns()
                        ->setGap('small')
                        ->addItem('<div class="bg-primary text-white p-3 rounded text-center">Col 1</div>')
                        ->addItem('<div class="bg-success text-white p-3 rounded text-center">Col 2</div>')
                        ->addItem('<div class="bg-warning text-dark p-3 rounded text-center">Col 3</div>')
                        ->addItem('<div class="bg-danger text-white p-3 rounded text-center">Col 4</div>')
                        ->render()
                        ?>

                    <h5 class="text-muted mb-3 mt-4">Grid de 2 columnas con gap grande</h5>
                    <?= $ui->grid()
                        ->twoColumns()
                        ->setGap('large')
                        ->addItem($ui->panel('Panel Izquierdo', 'Contenido del panel izquierdo')->render())
                        ->addItem($ui->panel('Panel Derecho', 'Contenido del panel derecho')->render())
                        ->render()
                        ?>

                </div>
            </div>

            <footer class="mt-auto border-top">
                <div class="content__boxed">
                    <div class="content__wrap py-3">
                        <div class="text-center text-muted small">
                            &copy; 2025 Componentes Layout - Desarrollado por Javier
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