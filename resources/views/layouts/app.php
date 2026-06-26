<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AUTO PRO ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { background: #2c3e50; min-height: 100vh; color: #fff; }
        .nav-link { color: #bdc3c7 !important; padding: 12px; }
        .nav-link:hover { color: #fff !important; background: #34495e; }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar p-3" style="width: 260px;">
        <h4>🚗 AUTO PRO</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="?url=dashboard">📊 Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=vehicules_liste">🚗 Parc Véhicules</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=clients_liste">👤 Clients</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=sales_index">💰 Ventes / Loc</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=workshop_index">🛠️ Atelier</a></li>
            <li class="nav-item mt-4"><a class="nav-link btn btn-primary text-white" href="?url=vehicules_create">+ Ajouter Véhicule</a></li>
        </ul>
    </nav>
    <main class="p-4 flex-grow-1">
        <?php echo $content; ?>
    </main>
</div>
</body>
</html>
