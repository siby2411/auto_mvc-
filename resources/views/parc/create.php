<div class="art-bg"></div>
<style>
    :root { --glass: rgba(255, 255, 255, 0.07); --accent: #00d2ff; }
    body { background: #0f172a; color: #e2e8f0; font-family: 'Segoe UI', sans-serif; }
    .art-bg { position: fixed; top: -100px; right: -100px; width: 400px; height: 400px; background: linear-gradient(45deg, #1e3c72, var(--accent)); clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 80%); filter: blur(100px); z-index: -1; }
    .glass-card { background: var(--glass); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; padding: 2rem; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37); }
    .form-control { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 0.75rem; border-radius: 10px; }
    .form-control:focus { background: rgba(255,255,255,0.1); border-color: var(--accent); outline: none; }
</style>

<div class="container mt-5">
    <div class="glass-card">
        <h3 class="text-accent mb-4">Ajouter un Véhicule</h3>
        <form action="?url=vehicules_store" method="POST" enctype="multipart/form-data">
            <div class="mb-3"><label>Marque</label><input type="text" name="marque" class="form-control" required></div>
            <div class="mb-3"><label>Modèle</label><input type="text" name="modele" class="form-control" required></div>
            <div class="mb-3"><label>Immatriculation</label><input type="text" name="immatriculation" class="form-control" required></div>
            
            <div class="mb-4">
                <label>Photo du Véhicule</label>
                <input type="file" name="photo" class="form-control" accept="image/*">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-info px-4">Enregistrer</button>
                <a href="?url=vehicules_liste" class="btn btn-outline-light px-4 ms-2">Annuler</a>
            </div>
        </form>
    </div>
</div>
