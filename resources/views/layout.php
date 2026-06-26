<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AUTO PRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { height: 100vh; background: #343a40; color: white; padding-top: 20px; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 10px 20px; }
        .sidebar a:hover { background: #495057; }
        .btn-add { margin: 10px 20px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h4 class="text-center">AUTO PRO</h4>
                <a href="?url=dashboard">📊 Dashboard</a>
                <a href="?url=vehicules_liste">🚗 Parc Véhicules</a>
                <a href="?url=sales_index">💰 Ventes / Loc</a>
                <a href="?url=clients_liste">👤 Clients</a>
                <hr>
                <a href="?url=vehicules_create" class="btn btn-primary btn-add">+ Ajouter Véhicule</a>
            </div>
            <div class="col-md-10 mt-4"><?php echo $content; ?></div>
        </div>
    </div>
</body>
</html>
