<form action="?url=vehicules_store" method="POST" enctype="multipart/form-data">
    <input type="text" name="immatriculation" placeholder="Immatriculation" required>
    <input type="text" name="marque" placeholder="Marque" required>
    <input type="text" name="modele" placeholder="Modèle" required>
    <input type="file" name="galerie[]" multiple accept="image/*">
    <button type="submit">Enregistrer</button>
</form>
