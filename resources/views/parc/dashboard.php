<div class="banner mb-4" style="background: linear-gradient(135deg, #1a1a1a 0%, #ff4500 100%); padding: 40px; border-radius: 15px; color: white; text-align: center;">
    <h1 style="font-weight: 800; letter-spacing: 2px;">OMEGA INFORMATIQUE CONSULTING</h1>
    <p style="font-size: 1.2rem; opacity: 0.9;">Systèmes Intelligents de Gestion Automobile</p>
</div>

<div class="row mb-5">
    <div class="col-md-4"><div class="card bg-dark text-white p-3"><h5>Total</h5><h3><?= $total ?></h3></div></div>
    <div class="col-md-4"><div class="card bg-warning p-3"><h5>Maintenance</h5><h3><?= $enMaintenance ?></h3></div></div>
    <div class="col-md-4"><div class="card bg-success text-white p-3"><h5>Bénéfices</h5><h3><?= number_format($benefice, 2) ?> €</h3></div></div>
</div>

<h3>Galerie Marketing Active (4 Canaux)</h3>
<form action="?url=vehicules_store" method="POST" enctype="multipart/form-data">
    <div class="row">
        <?php for($i=1; $i<=4; $i++): ?>
        <div class="col-md-3">
            <div class="card p-3 text-center" style="border: 2px dashed #333; height: 200px;">
                <p>Angle <?= $i ?></p>
                <input type="file" name="galerie[]" class="form-control-file">
            </div>
        </div>
        <?php endfor; ?>
    </div>
    <button type="submit" class="btn btn-danger mt-3">Enregistrer Galerie & Véhicule</button>
</form>
