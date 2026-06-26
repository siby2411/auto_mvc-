<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AUTO PRO ERP - Gestion Automobile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { background: #212529; min-height: 100vh; color: #fff; }
        .nav-link { color: #adb5bd !important; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: #fff !important; background: #0d6efd; }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar p-3" style="width: 250px;">
        <h4 class="text-center">🚗 AUTO PRO</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="?url=dashboard">📊 Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=vehicules_liste">🚗 Parc Véhicules</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=clients_liste">👤 Clients</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=sales_index">💰 Ventes / Loc</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=workshop_index">🛠️ Atelier</a></li>
            <li class="nav-item"><a class="nav-link" href="?url=vehicules_create">+ Ajouter Véhicule</a></li>
        </ul>
    </nav>
    <main class="flex-grow-1 p-4">
        <?php echo $content; ?>
    </main>
</div>
</body>
</html>
