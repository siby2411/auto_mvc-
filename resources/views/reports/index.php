<div class="art-bg"></div>

<div class="container-fluid mt-4">
    <!-- En-tête artistique -->
    <div class="d-flex gap-3 mb-5">
        <div class="trap-left p-3 text-dark fw-bold" style="width: 250px;">PILOTAGE OMEGA</div>
    </div>

    <!-- Formulaire de filtrage Glass -->
    <div class="glass-card mb-5">
        <form action="?url=reports_index" method="GET" class="row g-3 align-items-end">
            <input type="hidden" name="url" value="reports_index">
            <div class="col-md-3">
                <label>Mois</label>
                <select name="mois" class="form-control bg-transparent text-white border-secondary">
                    <?php for($m=1; $m<=12; $m++): $val = str_pad($m, 2, '0', STR_PAD_LEFT); ?>
                        <option value="<?= $val ?>" <?= ($mois == $val) ? 'selected' : '' ?>><?= $val ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label>Année</label>
                <input type="number" name="annee" class="form-control bg-transparent text-white border-secondary" value="<?= htmlspecialchars($annee) ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-info w-100">Filtrer</button>
            </div>
        </form>
    </div>

    <!-- Stats en cartes Glassmorphism -->
    <div class="row">
        <?php foreach ($stats as $s): ?>
        <div class="col-md-6">
            <div class="glass-card mb-4 text-center">
                <h5 class="text-uppercase text-info"><?= htmlspecialchars($s['type']) ?></h5>
                <h1 class="display-4 fw-bold text-white"><?= number_format($s['total'], 0, ',', ' ') ?> <small>FCFA</small></h1>
                <p class="text-secondary">Nombre d'opérations : <?= $s['nb'] ?? $s['nombre'] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Zone Graphique -->
    <div class="row mt-5">
        <div class="col-md-12 glass-card">
            <h4 class="mb-4 text-white">Répartition des Revenus</h4>
            <canvas id="typeChart" height="80"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('typeChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach($stats as $s) echo "'".htmlspecialchars($s['type'])."',"; ?>],
            datasets: [{
                label: 'Revenus (FCFA)',
                data: [<?php foreach($stats as $s) echo $s['total'].","; ?>],
                backgroundColor: [
                    'rgba(255, 215, 0, 0.8)', 
                    'rgba(0, 210, 255, 0.8)', 
                    'rgba(255, 99, 132, 0.8)'
                ],
                borderColor: '#ffffff',
                borderWidth: 1,
                borderRadius: 10
            }]
        },
        options: { 
            responsive: true,
            scales: {
                y: { ticks: { color: '#ffffff' }, grid: { color: 'rgba(255,255,255,0.1)' } },
                x: { ticks: { color: '#ffffff' }, grid: { color: 'rgba(255,255,255,0.1)' } }
            },
            plugins: {
                legend: { labels: { color: '#ffffff' } }
            }
        }
    });
</script>

<style>
:root { --glass: rgba(255, 255, 255, 0.1); --accent: #00d2ff; }
body { background: #0f172a; color: #e2e8f0; font-family: 'Segoe UI', sans-serif; }

.art-bg {
    position: fixed; top: -100px; right: -100px;
    width: 400px; height: 400px;
    background: linear-gradient(45deg, #1e3c72, var(--accent));
    clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 80%);
    filter: blur(80px); z-index: -1;
}

.glass-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 2rem;
    transition: transform 0.3s ease;
}

.glass-card:hover { transform: translateY(-5px); border-color: var(--accent); }
.trap-left { clip-path: polygon(0 0, 90% 0, 100% 100%, 0% 100%); background: var(--accent); }
label { margin-bottom: 0.5rem; display: block; }
</style>
