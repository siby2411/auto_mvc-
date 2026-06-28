<div class="container-fluid mt-4">
    <div class="d-flex gap-3 mb-4">
        <div class="trap-left d-flex align-items-center justify-content-center text-white fw-bold">PROFIL</div>
        <div class="trap-right d-flex align-items-center justify-content-center text-white fw-bold">FICHE TECHNIQUE & CONDITIONS</div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 mb-4">
                <?php if (!empty($images)): ?>
                    <img src="<?= $images[0]['chemin'] ?>" class="img-fluid rounded" style="width: 100%; height: 350px; object-fit: cover;">
                <?php else: ?>
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 350px;">Pas d'image</div>
                <?php endif; ?>
            </div>
            
            <?php
            $msg = urlencode("Bonjour, je souhaite louer le véhicule : " . $v['marque'] . " " . $v['modele']);
            ?>
            <a href="https://wa.me/221776542803?text=<?= $msg ?>" target="_blank" class="btn btn-success btn-lg w-100 shadow">
                💬 Louer via WhatsApp
            </a>
        </div>

        <div class="col-md-7">
            <h2 class="text-primary"><?= htmlspecialchars($v['marque'] . ' ' . $v['modele']) ?></h2>
            <p class="text-muted">Immat: <?= htmlspecialchars($v['immatriculation']) ?></p>
            
            <div class="accordion mt-4" id="infoAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cond1">✅ Nos Avantages</button></h2>
                    <div id="cond1" class="accordion-collapse collapse show" data-bs-parent="#infoAccordion">
                        <div class="accordion-body">
                            <ul>
                                <li>Assurance tous risques incluse.</li>
                                <li>Assistance 24/7 disponible sur tout le territoire.</li>
                                <li>Véhicule révisé et désinfecté avant chaque départ.</li>
                                <li>Kilométrage illimité pour les locations longue durée.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cond2">📄 Conditions de Location</button></h2>
                    <div id="cond2" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
                        <div class="accordion-body">
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

<style>
.trap-left { width: 15%; height: 50px; background: #2c3e50; clip-path: polygon(0 0, 90% 0, 100% 100%, 0% 100%); }
.trap-right { width: 85%; height: 50px; background: #1e3c72; clip-path: polygon(0 0, 100% 0, 100% 100%, 2% 100%); }
</style>
