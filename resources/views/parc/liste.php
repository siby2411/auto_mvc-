<div class="art-bg"></div>
<style>
    :root { --glass: rgba(255, 255, 255, 0.07); --accent: #00d2ff; }
    body { background: #0f172a; color: #e2e8f0; font-family: 'Segoe UI', sans-serif; }
    
    .art-bg { 
        position: fixed; top: -100px; right: -100px; width: 400px; height: 400px; 
        background: linear-gradient(45deg, #1e3c72, var(--accent)); 
        clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 80%); 
        filter: blur(100px); z-index: -1; 
    }
    
    .glass-card { 
        background: var(--glass); backdrop-filter: blur(15px); 
        border: 1px solid rgba(255, 255, 255, 0.1); 
        border-radius: 20px; padding: 2rem; 
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37); 
    }
    
    .veh-img { width: 80px; height: 50px; object-fit: cover; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2); }
    .table { color: #fff !important; vertical-align: middle; }
    .table thead { color: var(--accent); }
</style>

<div class="container-fluid mt-4">
    <div class="glass-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-white">Parc Automobile</h3>
            <a href="?url=vehicules_create" class="btn btn-info px-4">+ Ajouter Véhicule</a>
        </div>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Immatriculation</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicules as $v): ?>
                <tr>
                    <td>
                        <?php if (!empty($v['photo_path'])): ?>
                            <img src="public/uploads/vehicules/<?= htmlspecialchars($v['photo_path']) ?>" class="veh-img" alt="Photo">
                        <?php else: ?>
                            <div class="veh-img bg-dark d-flex align-items-center justify-content-center text-muted small">N/A</div>
                        <?php endif; ?>
                    </td>
                    <td><strong><?= htmlspecialchars($v['immatriculation']) ?></strong></td>
                    <td><?= htmlspecialchars($v['marque']) ?></td>
                    <td><?= htmlspecialchars($v['modele']) ?></td>
                    <td><span class="badge bg-secondary"><?= htmlspecialchars($v['statut']) ?></span></td>
                    <td class="text-end">
                        <a href="?url=vehicules_profil&id=<?= $v['id'] ?>" class="btn btn-sm btn-outline-info">Voir Profil</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
