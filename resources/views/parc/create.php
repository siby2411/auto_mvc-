<h2>Ajouter Véhicule avec Galerie</h2>
<form action="?url=vehicules_store" method="POST" enctype="multipart/form-data">
    <input type="text" name="immatriculation" class="form-control mb-2" placeholder="Immatriculation" required>
    <label>Sélectionnez les images (angles multiples) :</label>
    <input type="file" name="galerie[]" class="form-control mb-2" multiple accept="image/*">
    <button type="submit" class="btn btn-primary">Enregistrer Véhicule</button>
</form>
