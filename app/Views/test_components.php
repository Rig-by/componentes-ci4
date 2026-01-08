<!DOCTYPE html>
<html lang="es" data-bs-theme="light" data-scheme="navy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparativa: HTML vs PHP Components</title>
    
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/nifty.min.css') ?>" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        /* Estilo extra para resaltar la diferencia en la demo */
        .demo-section {
            border: 2px dashed #e5e5e5;
            padding: 20px;
            border-radius: 10px;
            height: 100%;
        }
        .badge-legacy { background-color: #6c757d; color: white; margin-bottom: 15px; display: inline-block; padding: 5px 10px; border-radius: 4px; }
        .badge-new { background-color: #25476a; color: white; margin-bottom: 15px; display: inline-block; padding: 5px 10px; border-radius: 4px; }
    </style>
</head>
<body class="bg-light">

    <?php $ui = new \App\Libraries\UiComponents(); ?>

    <div class="container py-5">
        
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold">Evolución del Código</h1>
            <p class="lead">Comparativa visual entre la implementación manual y la nueva librería de componentes.</p>
        </div>

        <div class="row">

            <div class="col-md-6 mb-4">
                <div class="demo-section bg-white">
                    <div class="badge-legacy">❌ ANTES (HTML Manual)</div>
                    <p class="text-muted small mb-4">
                        Requiere escribir ~15 líneas de código por elemento. Difícil de mantener si cambia el diseño.
                    </p>

                    <h6 class="text-uppercase text-muted ls-1 mb-2">Tarjeta de KPI</h6>
                    
                    <div class="card mb-3">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-3">
                                    <i class="bi-currency-dollar fs-2"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="h2 mb-0">$ 12,500</h5>
                                <p class="text-body-secondary mb-0">Ingresos (HTML)</p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="text-uppercase text-muted ls-1 mb-2">Barra de Progreso</h6>
                    
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-bold small">Meta Mensual (HTML)</span>
                            <span class="small">45%</span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" 
                                 role="progressbar" 
                                 style="width: 45%" 
                                 aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="demo-section bg-white border-primary" style="border-style: solid; border-width: 1px;">
                    <div class="badge-new">✅ AHORA (Tu Librería PHP)</div>
                    <p class="text-muted small mb-4">
                        Solo 1 línea de código. Se actualiza automáticamente si cambias la clase base.
                    </p>

                    <h6 class="text-uppercase text-muted ls-1 mb-2">Tarjeta de KPI</h6>
                    
                    <?= $ui->kpiCard('Ingresos (PHP)', '$ 12,500', 'bi-currency-dollar', 'success') ?>
                    
                    <div class="alert alert-info py-1 px-2 mt-2 small">
                        <i class="bi-code-slash me-1"></i> 
                        <code>$ui->kpiCard(...)</code>
                    </div>

                    <hr class="my-4">

                    <h6 class="text-uppercase text-muted ls-1 mb-2">Barra de Progreso</h6>

                    <?= $ui->progressBar(85, 'info', 'Meta Mensual (PHP)') ?>

                    <div class="alert alert-info py-1 px-2 mt-2 small">
                        <i class="bi-code-slash me-1"></i> 
                        <code>$ui->progressBar(...)</code>
                    </div>

                </div>
            </div>

        </div> <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">Demostración de Flexibilidad (Setters)</h5>
                    </div>
                    <div class="card-body">
                        <p>Podemos encadenar métodos para configuraciones complejas sin ensuciar el HTML:</p>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <?= $ui->kpiCard()
                                       ->setTitle('Usuarios Bloqueados')
                                       ->setValue('15')
                                       ->setIcon('bi-shield-lock-fill')
                                       ->setColor('danger')
                                       ->addClass('border border-danger') // ¡Añadir clase extra es trivial!
                                       ->render() 
                                ?>
                            </div>
                            <div class="col-md-8 d-flex align-items-center text-muted">
                                <span>
                                    &larr; Este componente usa <code>->addClass('border-danger')</code> dinámicamente. 
                                    Intenta hacer eso con HTML puro sin romper la estructura.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/nifty.min.js') ?>"></script>
</body>
</html>