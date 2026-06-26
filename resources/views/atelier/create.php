<h2>Nouvelle Fiche d'Entretien</h2>
<form action="?url=workshop_store" method="POST">
    <select name="vehicule_id" class="form-control mb-2">
        <?php foreach($vehicules as $v): ?>
            <option value="<?= $v['id'] ?>"><?= $v['marque'] ?> <?= $v['modele'] ?></option>
        <?php endforeach; ?>
    </select>
    <textarea name="description" class="form-control mb-2" placeholder="Détails réparation"></textarea>
    <input type="number" name="cout" class="form-control mb-2" placeholder="Coût">
    <input type="date" name="date" class="form-control mb-2">
    <button type="submit" class="btn btn-warning">Enregistrer Entretien</button>
</form>
