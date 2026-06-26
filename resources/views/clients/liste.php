<h2>Liste des Clients</h2>
<table class="table">
    <thead><tr><th>ID</th><th>Nom</th></tr></thead>
    <tbody>
        <?php foreach($clients as $c): ?>
        <tr><td><?= $c['id'] ?></td><td><?= $c['nom'] ?></td></tr>
        <?php endforeach; ?>
    </tbody>
</table>
