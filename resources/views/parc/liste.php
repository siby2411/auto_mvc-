<div class="container-fluid">
    <div class="d-flex gap-3 mb-4">
        <div class="trap-left d-flex align-items-center justify-content-center text-white fw-bold">PARC</div>
        <div class="trap-right d-flex align-items-center justify-content-center text-white fw-bold">GESTION AUTOMOBILE</div>
    </div>

    <div class="row">
        <?php foreach($vehicules as $v): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 h-100 hover-card">
                <div class="card-body">
                    <h5 class="card-title text-primary"><?= htmlspecialchars($v['marque'] . ' ' . $v['modele']) ?></h5>
                    <p class="text-muted small">Immat: <?= htmlspecialchars($v['immatriculation']) ?></p>
                    <div class="badge bg-info mb-3"><?= $v['statut'] ?></div>
                    <div class="d-flex gap-2">
                        <a href="?url=vehicules_profil&id=<?= $v['id'] ?>" class="btn btn-sm btn-outline-dark">Voir Profil</a>
                        <a href="?url=vehicules_delete&id=<?= $v['id'] ?>" class="btn btn-sm btn-outline-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.hover-card { transition: 0.3s; border-radius: 10px; }
.hover-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
.trap-left { width: 15%; height: 50px; background: #2c3e50; clip-path: polygon(0 0, 90% 0, 100% 100%, 0% 100%); }
.trap-right { width: 85%; height: 50px; background: #1e3c72; clip-path: polygon(0 0, 100% 0, 100% 100%, 2% 100%); }
</style>
