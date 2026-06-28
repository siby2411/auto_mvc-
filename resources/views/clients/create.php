<div class="art-bg"></div>
<style>
    :root { --glass: rgba(255, 255, 255, 0.07); --accent: #00d2ff; }
    body { background: #0f172a; color: #e2e8f0; font-family: 'Segoe UI', sans-serif; }
    .art-bg { position: fixed; top: -100px; right: -100px; width: 400px; height: 400px; background: linear-gradient(45deg, #1e3c72, var(--accent)); clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 80%); filter: blur(100px); z-index: -1; }
    .glass-card { background: var(--glass); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; padding: 2rem; }
    .form-control { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 0.75rem; border-radius: 10px; }
</style>

<div class="container mt-5">
    <div class="glass-card">
        <h3 class="text-accent mb-4">Enregistrer un nouveau client</h3>
        <form action="?url=clients_store" method="POST">
            <div class="mb-3"><label>Nom Complet</label><input type="text" name="nom" class="form-control" required></div>
            <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
            <div class="mb-3"><label>Téléphone</label><input type="text" name="telephone" class="form-control"></div>
            <button type="submit" class="btn btn-info mt-3">Enregistrer</button>
            <a href="?url=clients_liste" class="btn btn-outline-light mt-3">Annuler</a>
        </form>
    </div>
</div>
