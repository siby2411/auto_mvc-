<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTO PRO ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { background: #2c3e50; min-height: 100vh; color: #fff; }
        .nav-link { color: #bdc3c7 !important; padding: 12px; }
        .nav-link:hover { color: #fff !important; background: #34495e; }
        
        /* Style de la bannière */
        .banner-pro {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: #ffffff;
            padding: 40px 30px;
            border-radius: 0 0 20px 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .banner-content h1 {
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 1.8rem;
        }
        .banner-content p {
            margin: 5px 0 0;
            opacity: 0.8;
            font-size: 0.95rem;
        }
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
            <li class="nav-item"><a class="nav-link" href="?url=reports_index">📈 États Financiers</a></li>
            <li class="nav-item mt-4"><a class="nav-link btn btn-primary text-white" href="?url=vehicules_create">+ Ajouter Véhicule</a></li>
        </ul>
    </nav>
    
    <main class="flex-grow-1">
        <header class="banner-pro shadow">
            <div class="banner-content">
                <h1>OMEGA INFORMATIQUE CONSULTING</h1>
                <p>Systèmes Intelligents de Gestion Automobile | AUTO PRO v1.0</p>
            </div>
        </header>
        
        <div class="p-4">
            <?php echo $content; ?>
        </div>
    </main>
</div>
</body>
</html>
