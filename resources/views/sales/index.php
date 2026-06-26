<div class="container mt-4">
    <h3>🔍 Disponibilité pour Ventes / Locations</h3>
    <form method="GET" class="row g-3 bg-light p-3 rounded mb-4">
        <input type="hidden" name="url" value="sales_index">
        <div class="col-md-4">
            <input type="date" name="date_debut" class="form-control" value="<?= $debut ?? '' ?>">
        </div>
        <div class="col-md-4">
            <input type="date" name="date_fin" class="form-control" value="<?= $fin ?? '' ?>">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">Rechercher</button>
        </div>
    </form>

    <?php if (!empty($vehicules)): ?>
    <table class="table table-hover">
        <thead class="table-dark"><tr><th>Immat</th><th>Marque</th><th>Modèle</th><th>Actions</th></tr></thead>
        <tbody>
            <?php foreach($vehicules as $v): ?>
            <tr>
                <td><?= $v['immatriculation'] ?></td>
                <td><?= $v['marque'] ?></td>
                <td><?= $v['modele'] ?></td>
                <td>
                    <a href="?url=sales_reserve&immat=<?= $v['immatriculation'] ?>&type=Location" class="btn btn-sm btn-info">Louer</a>
                    <a href="?url=sales_reserve&immat=<?= $v['immatriculation'] ?>&type=Vente" class="btn btn-sm btn-warning">Vendre</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
