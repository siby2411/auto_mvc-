<div class="container-fluid mt-4">
    <div class="d-flex gap-3 mb-4">
        <div class="trap-left d-flex align-items-center justify-content-center text-white fw-bold">PROFIL</div>
        <div class="trap-right d-flex align-items-center justify-content-center text-white fw-bold">FICHE TECHNIQUE & DÉTAILS</div>
    </div>

    <div class="card shadow-lg border-0 rounded-4 p-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm overflow-hidden">
                    <?php if (!empty($images)): ?>
                        <img src="<?= $images[0]['chemin'] ?>" class="img-fluid" style="width: 100%; height: 400px; object-fit: cover;">
                    <?php else: ?>
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 400px;">Aucune image</div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="col-md-6">
                <h2 class="text-primary mb-3"><?= htmlspecialchars($v['marque'] . ' ' . $v['modele']) ?></h2>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between">
                        <span>Immatriculation:</span> <strong><?= htmlspecialchars($v['immatriculation']) ?></strong>
                    </div>
                    <div class="list-group-item d-flex justify-content-between">
                        <span>Statut actuel:</span> 
                        <span class="badge bg-success"><?= htmlspecialchars($v['statut']) ?></span>
                    </div>
                </div>
                
                <div class="mt-5">
                    <a href="?url=vehicules_liste" class="btn btn-outline-secondary">← Retour au Parc</a>
                    <a href="#" class="btn btn-primary">Modifier Fiche</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.trap-left { width: 15%; height: 50px; background: #2c3e50; clip-path: polygon(0 0, 90% 0, 100% 100%, 0% 100%); }
.trap-right { width: 85%; height: 50px; background: #1e3c72; clip-path: polygon(0 0, 100% 0, 100% 100%, 2% 100%); }
</style>
