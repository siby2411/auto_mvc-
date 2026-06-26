<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AUTO PRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="?url=dashboard">🚗 AUTO PRO</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="?url=dashboard">📊 Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="?url=vehicules_liste">🚗 Parc</a></li>
                    <li class="nav-item"><a class="nav-link" href="?url=sales_index">💰 Ventes / Loc</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <?php echo $content; ?>
    </div>
</body>
</html>
