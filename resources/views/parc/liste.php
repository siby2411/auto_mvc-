<div class="container mt-4">
    <h3>Parc Automobile</h3>
    <table class="table">
        <thead>
            <tr><th>Immat</th><th>Marque</th><th>Modèle</th><th>Images</th></tr>
        </thead>
        <tbody>
            <?php foreach($vehicules as $v): ?>
            <tr>
                <td><?= $v['immatriculation'] ?></td>
                <td><?= $v['marque'] ?></td>
                <td><?= $v['modele'] ?></td>
                <td>
                    <?php 
                    $imgs = $this->db()->prepare("SELECT chemin FROM images WHERE vehicule_id = ?");
                    $imgs->execute([$v['id']]);
                    foreach($imgs->fetchAll() as $img): ?>
                        <img src="<?= $img['chemin'] ?>" width="60" class="img-thumbnail">
                    <?php endforeach; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
