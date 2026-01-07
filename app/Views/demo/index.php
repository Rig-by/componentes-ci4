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
            <p><?= esc($description) ?></p>
        </header>

        <nav class="demo-nav">
            <a href="<?= base_url('demo') ?>" class="nav-link active">Inicio</a>
            <a href="<?= base_url('demo/statistics') ?>" class="nav-link">Estadísticas</a>
            <a href="<?= base_url('demo/tables') ?>" class="nav-link">Tablas</a>
        </nav>

        <main class="demo-content">
            <section class="welcome-section">
                <h2>Bienvenido a la Demo de Componentes</h2>
                <p>Este proyecto contiene componentes reutilizables para CodeIgniter 4:</p>
                
                <div class="components-grid">
                    <div class="component-card">
                        <h3>📊 Estadísticas</h3>
                        <p>KPI Cards, Badges, Comparaciones, Progress Bars</p>
                        <a href="<?= base_url('demo/statistics') ?>" class="btn">Ver componentes</a>
                    </div>
                    
                    <div class="component-card">
                        <h3>📋 Tablas</h3>
                        <p>DataTables, Tablas simples, Tablas resumen</p>
                        <a href="<?= base_url('demo/tables') ?>" class="btn">Ver componentes</a>
                    </div>
                    
                    <div class="component-card">
                        <h3>🎨 Layout</h3>
                        <p>Cards, Alerts, Panels, Grids</p>
                        <a href="#" class="btn">Próximamente</a>
                    </div>
                </div>
            </section>
        </main>

        <footer class="demo-footer">
            <p>Proyecto de Componentes CI4 - Equipo Bejar 2025</p>
        </footer>
    </div>

    <script src="<?= base_url('js/components.js') ?>"></script>
</body>
</html>