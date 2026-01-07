<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/components.css') ?>">
</head>
<body>
    <div class="container">
        <header class="demo-header">
            <h1><?= esc($title) ?></h1>
        </header>

        <nav class="demo-nav">
            <a href="<?= base_url('demo') ?>" class="nav-link">Inicio</a>
            <a href="<?= base_url('demo/statistics') ?>" class="nav-link active">Estadísticas</a>
            <a href="<?= base_url('demo/tables') ?>" class="nav-link">Tablas</a>
        </nav>

        <main class="demo-content">
            <?php 
            $ui = new \App\Libraries\UiComponents();
            ?>

            <!-- StatBadges -->
            <section class="demo-section">
                <h2>StatBadge - Insignias de Estadísticas</h2>
                <div class="badges-container">
                    <?php foreach($stats['badges'] as $badge): ?>
                        <?= $ui->statBadge($badge) ?>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ComparisonCards -->
            <section class="demo-section">
                <h2>ComparisonCard - Tarjetas de Comparación</h2>
                <div class="comparison-container">
                    <?php foreach($stats['comparisons'] as $comparison): ?>
                        <?= $ui->comparisonCard($comparison) ?>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Timeline -->
            <section class="demo-section">
                <h2>Timeline - Línea de Tiempo</h2>
                <?= $ui->timeline($stats['timeline']) ?>
            </section>
        </main>

        <footer class="demo-footer">
            <p>Proyecto de Componentes CI4 - Equipo Bejar 2025</p>
        </footer>
    </div>

    <script src="<?= base_url('js/components.js') ?>"></script>
</body>
</html>