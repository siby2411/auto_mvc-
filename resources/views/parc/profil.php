<div class="art-bg"></div>
<style>
    :root { --glass: rgba(255, 255, 255, 0.07); --accent: #00d2ff; }
    body { background: #0f172a; color: #e2e8f0; font-family: 'Segoe UI', sans-serif; }
    .art-bg { position: fixed; top: -100px; right: -100px; width: 400px; height: 400px; background: linear-gradient(45deg, #1e3c72, var(--accent)); clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 80%); filter: blur(100px); z-index: -1; }
    .glass-card { background: var(--glass); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; padding: 2rem; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37); }
    .text-accent { color: var(--accent); }
    .trap-left { width: 15%; height: 50px; background: #2c3e50; clip-path: polygon(0 0, 90% 0, 100% 100%, 0% 100%); }
    .trap-right { width: 85%; height: 50px; background: #1e3c72; clip-path: polygon(0 0, 100% 0, 100% 100%, 2% 100%); }
    .accordion-button { background: rgba(255,255,255,0.05) !important; color: white !important; }
</style>

<div class="container-fluid mt-4">
    <div class="d-flex gap-3 mb-4">
        <div class="trap-left d-flex align-items-center justify-content-center text-white fw-bold">PROFIL</div>
        <div class="trap-right d-flex align-items-center justify-content-center text-white fw-bold">FICHE TECHNIQUE & CONDITIONS</div>
    </div>                    

    <div class="row">
        <div class="col-md-5">
            <div class="glass-card mb-4">
                <?php if (!empty($v['photo_path'])): ?>
                    <img src="public/uploads/vehicules/<?= htmlspecialchars($v['photo_path']) ?>" 
                         class="img-fluid rounded" 
                         style="max-height: 300px; width: 100%; object-fit: cover;" 
                         alt="Photo Véhicule">
                <?php else: ?>
                    <div class="bg-secondary p-5 text-center text-white rounded">Aucune image disponible</div>
                <?php endif; ?>

                <h2 class="text-accent mt-3"><?= htmlspecialchars($v['marque'] . ' ' . $v['modele']) ?></h2>
                <p>Immatriculation : <strong><?= htmlspecialchars($v['immatriculation']) ?></strong></p>
                <p>Statut : <span class="badge bg-info"><?= htmlspecialchars($v['statut']) ?></span></p>
            </div>

            <?php $msg = urlencode("Bonjour, je souhaite louer le véhicule : " . $v['marque'] . " " . $v['modele']); ?>
            <a href="https://wa.me/221776542803?text=<?= $msg ?>" target="_blank" class="btn btn-success btn-lg w-100 shadow">
                💬 Louer via WhatsApp
            </a>
        </div>

        <div class="col-md-7">
            <div class="glass-card">
                <div class="accordion" id="infoAccordion">
                    <div class="accordion-item border-0 bg-transparent">
                        <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cond1">✅ Nos Avantages</button></h2>
                        <div id="cond1" class="accordion-collapse collapse show" data-bs-parent="#infoAccordion">
                            <div class="accordion-body text-light">
                                <ul>
                                    <li>Assurance tous risques incluse.</li>
                                    <li>Assistance 24/7 disponible sur tout le territoire.</li>
                                    <li>Véhicule révisé et désinfecté avant chaque départ.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 bg-transparent">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cond2">📄 Conditions de Location</button></h2>
                        <div id="cond2" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
                            <div class="accordion-body text-light">
                                <ul>
                                    <li>Permis de conduire valide (minimum 2 ans).</li>
                                    <li>Dépôt de garantie requis (CB ou Espèces).</li>
                                    <li>Retour avec le plein de carburant obligatoire.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
