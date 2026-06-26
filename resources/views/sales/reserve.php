<div class="container mt-4">
    <h3>Confirmer la transaction</h3>
    <form action="?url=sales_reserve" method="POST" class="bg-white p-4 shadow rounded">
        <div class="mb-3">
            <label>Immatriculation du véhicule</label>
            <input type="text" name="immatriculation" class="form-control" 
                   value="<?= $_GET['immat'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
            <label>Date Début</label>
            <input type="date" name="date_debut" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date Fin</label>
            <input type="date" name="date_fin" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Montant (€)</label>
            <input type="number" name="montant" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
