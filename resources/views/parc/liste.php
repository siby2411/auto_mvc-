<h2>Parc Automobile</h2>
<table class="table">
    <tr><th>Immatriculation</th><th>Marque</th><th>Modèle</th><th>Km</th></tr>
    <?php foreach($vehicules as $v): ?>
    <tr><td><?= $v['immatriculation'] ?></td><td><?= $v['marque'] ?></td><td><?= $v['modele'] ?></td><td><?= $v['kilometrage'] ?></td></tr>
    <?php endforeach; ?>
</table>
<a href="?url=vehicules_create" class="btn btn-primary">+ Ajouter</a>
