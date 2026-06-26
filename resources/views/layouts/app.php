<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTO PRO ERP - Omega Informatique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .sidebar { background: #2c3e50; min-height: 100vh; color: #fff; }
        .nav-link { color: #bdc3c7 !important; transition: 0.3s; padding: 12px; }
        .nav-link:hover, .nav-link.active { color: #fff !important; background: #34495e; border-left: 4px solid #3498db; }
        .header-brand { background: #2c3e50; color: #ecf0f1; padding: 20px; border-bottom: 2px solid #3498db; }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar p-3" style="width: 260px;">
        <h4 class="text-center py-2">🚗 AUTO PRO</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="?url=dashboard">📊 Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=vehicules_liste">🚗 Parc Véhicules</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=clients_liste">👤 Clients</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=sales_index">💰 Ventes / Loc</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=workshop_index">🛠️ Atelier</a></li>
            <li class="nav-item"><hr><a class="nav-link text-primary" href="?url=vehicules_create">+ Ajouter Véhicule</a></li>
        </ul>
    </nav>

    <main class="flex-grow-1">
        <header class="header-brand shadow-sm">
            <h1 class="h3 mb-0">OMEGA INFORMATIQUE CONSULTING</h1>
            <small class="text-info">Systèmes Intelligents de Gestion Automobile</small>
        </header>
        <div class="p-4">
            <?php echo $content; ?>
        </div>
    </main>
</div>
</body>
</html>
