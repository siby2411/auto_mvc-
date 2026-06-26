<h2>Détails du Véhicule : <?= $vehicule['marque'] . ' ' . $vehicule['modele'] ?></h2>

<div class="row">
    <?php 
    // Récupération des images liées au véhicule
    $images = $this->db()->prepare("SELECT chemin FROM images WHERE vehicule_id = ?");
    $images->execute([$vehicule['id']]);
    $galerie = $images->fetchAll();
    
    foreach($galerie as $img): ?>
        <div class="col-md-3">
            <img src="<?= $img['chemin'] ?>" class="img-thumbnail" alt="Photo véhicule">
        </div>
    <?php endforeach; ?>
</div>

<a href="?url=vehicules_liste" class="btn btn-secondary mt-3">Retour à la liste</a>
