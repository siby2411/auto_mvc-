<div class="card shadow p-4">
    <h3>Transaction : <?= $type_initial ?></h3>
    <form action="?url=sales_reserve" method="POST">
        <input type="hidden" name="immatriculation" value="<?= $immat ?>">
        <input type="hidden" name="type" value="<?= $type_initial ?>">
        
        <div class="mb-3"><label>Immatriculation</label><input type="text" class="form-control" value="<?= $immat ?>" disabled></div>
        
        <?php if ($type_initial === 'Location'): ?>
            <div class="mb-3"><label>Date Début</label><input type="date" name="date_debut" class="form-control" required></div>
            <div class="mb-3"><label>Date Fin</label><input type="date" name="date_fin" class="form-control" required></div>
        <?php endif; ?>

        <div class="mb-3"><label>Nom Client</label><input type="text" name="client_nom" class="form-control" required></div>
        <div class="mb-3"><label>Montant</label><input type="number" name="montant" class="form-control" required></div>
        
        <button type="submit" class="btn btn-success">Enregistrer Transaction</button>
        <a href="?url=sales_index" class="btn btn-secondary">Annuler</a>
    </form>
</div>
