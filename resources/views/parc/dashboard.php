<div class="row mb-4">
    <div class="col-md-4"><div class="card p-3 border-primary"><h5>Parc</h5><h2><?= $total ?? 0 ?></h2></div></div>
    <div class="col-md-4"><div class="card p-3 border-warning"><h5>Maintenance</h5><h2><?= $enMaintenance ?? 0 ?></h2></div></div>
    <div class="col-md-4"><div class="card p-3 border-success"><h5>Bénéfices</h5><h2><?= number_format((float)($benefice ?? 0), 2, ',', ' ') ?> €</h2></div></div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white"><h5>Galerie Marketing Dynamique</h5></div>
    <div class="card-body">
        <form action="?url=upload_marketing" method="POST" enctype="multipart/form-data">
            <div id="upload-container" class="row">
                <?php for($i = 1; $i <= 4; $i++): ?>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Angle <?= $i ?></label>
                    <input type="file" name="angle_<?= $i ?>" class="form-control" accept="image/*">
                </div>
                <?php endfor; ?>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer tous les angles</button>
        </form>
        
        <hr>
        <div class="row mt-3">
            <?php for($i = 1; $i <= 4; $i++): 
                $img = $this->db()->prepare("SELECT chemin FROM marketing_images WHERE angle = ? ORDER BY id DESC LIMIT 1");
                $img->execute([$i]);
                $data = $img->fetch();
            ?>
            <div class="col-md-3 text-center">
                <h6>Angle <?= $i ?></h6>
                <?= $data ? '<img src="'.$data['chemin'].'" class="img-fluid rounded border shadow-sm">' : '<div class="p-4 bg-light border">Vide</div>' ?>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
