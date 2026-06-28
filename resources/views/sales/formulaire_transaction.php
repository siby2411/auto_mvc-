<div class="card shadow p-4">
    <h3 class="mb-4">Nouvelle Transaction : <?= htmlspecialchars($type_initial) ?></h3>
    
    <form action="?url=sales_reserve" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="immatriculation" value="<?= htmlspecialchars($immat) ?>">
        <input type="hidden" name="type" value="<?= htmlspecialchars($type_initial) ?>">
        
        <div class="mb-3">
            <label>Immatriculation</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($immat) ?>" disabled>
        </div>

        <?php if ($type_initial === 'Location'): ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Date Début</label>
                    <input type="date" name="date_debut" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Date Fin</label>
                    <input type="date" name="date_fin" class="form-control" required>
                </div>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label>Nom Client</label>
            <input type="text" name="client_nom" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Email Client</label>
            <input type="email" name="client_email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Montant</label>
            <input type="number" name="montant" class="form-control" required>
        </div>

        <div class="mb-4 p-3 border rounded bg-light">
            <label class="form-label"><strong>Contrat Scanné (PDF/JPG)</strong></label>
            <input type="file" name="contrat" class="form-control">
            <small class="text-muted">Format recommandé : PDF ou JPG (Max 5Mo)</small>
        </div>

        <button type="submit" class="btn btn-success px-4">Enregistrer la Transaction</button>
        <a href="?url=sales_index" class="btn btn-secondary">Annuler</a>
    </form>
</div>
