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
            <a href="<?= base_url('demo/statistics') ?>" class="nav-link">Estadísticas</a>
            <a href="<?= base_url('demo/tables') ?>" class="nav-link active">Tablas</a>
        </nav>

        <main class="demo-content">
            <section class="demo-section">
                <h2>Componentes de Tablas</h2>
                <p>Los componentes de tablas serán desarrollados por Lizbeth.</p>
                <p>Esta sección mostrará: DataTable, SimpleTable y SummaryTable.</p>
            </section>
        </main>

        <footer class="demo-footer">
            <p>Proyecto de Componentes CI4 - Equipo Bejar 2025</p>
        </footer>
    </div>

    <script src="<?= base_url('js/components.js') ?>"></script>
</body>
</html>