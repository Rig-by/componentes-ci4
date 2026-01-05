<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 800px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
        }
        .version {
            color: #667eea;
            font-size: 14px;
            margin-bottom: 30px;
        }
        .status {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .team {
            margin-top: 30px;
        }
        .team h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 20px;
        }
        .member {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border-left: 4px solid #667eea;
        }
        .member strong {
            color: #667eea;
        }
        .links {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 2px solid #eee;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-right: 10px;
            margin-bottom: 10px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #764ba2;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= esc($title) ?></h1>
        <div class="version">Versión <?= esc($version) ?></div>
        
        <div class="status">
            <strong> Sistema Inicializado Correctamente</strong>
            <p>El proyecto base está configurado y listo para desarrollo.</p>
        </div>

        <div class="team">
            <h2>👥 Equipo de Desarrollo</h2>
            <?php foreach ($team as $name => $role): ?>
                <div class="member">
                    <strong><?= esc($name) ?>:</strong> <?= esc($role) ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="links">
            <a href="<?= base_url('demo') ?>" class="btn">Ver Demo</a>
            <a href="https://github.com/tu-usuario/componentes-ci4" class="btn" target="_blank">GitHub</a>
        </div>

        <div class="footer">
            Desarrollado con ❤️ por el equipo de Sistemas
        </div>
    </div>
</body>
</html>
