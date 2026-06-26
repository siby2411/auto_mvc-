<style>
    .marketing-gallery { 
        display: flex; 
        flex-wrap: wrap; 
        gap: 20px; 
        margin-top: 30px; 
    }
    .card-photo { 
        width: 250px; 
        height: 200px; 
        overflow: hidden; 
        border-radius: 12px; 
        box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    }
    .zoom-effect { 
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        transition: transform 0.8s ease; 
    }
    .card-photo:hover .zoom-effect { 
        transform: scale(1.15) rotate(1deg); 
    }
</style>

<h2>Détails : <?= htmlspecialchars($vehicule['marque'] . ' ' . $vehicule['modele']) ?></h2>

<div class="marketing-gallery">
    <?php if (!empty($galerie)): ?>
        <?php foreach($galerie as $img): ?>
            <div class="card-photo">
                <img src="<?= str_replace('../public/', '', $img) ?>" class="img-fluid zoom-effect">
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune image disponible pour ce véhicule.</p>
    <?php endif; ?>
</div>
