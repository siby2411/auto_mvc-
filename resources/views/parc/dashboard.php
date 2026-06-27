<div class="container-fluid">
    <div class="card p-3 mb-4 shadow-sm">
        <h5>🚀 Gestion Marketing</h5>
        <form action="?url=upload_marketing" method="POST" enctype="multipart/form-data" class="row g-2">
            <div class="col-md-10">
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark w-100">Upload</button>
            </div>
        </form>
    </div>

    <div class="d-flex gap-3 mb-4">
        <div class="trap-left d-flex align-items-center justify-content-center">
            <span class="fw-bold">OMEGA</span>
        </div>
        <div class="trap-right d-flex align-items-center justify-content-center">
            <p class="mb-0 fw-bold">🚀 SYSTÈMES INTELLIGENTS DE GESTION AUTOMOBILE</p>
        </div>
    </div>

    <div class="row mb-4">
        <?php 
        $dir = "public/uploads/";
        if (is_dir($dir)) {
            // Récupère les fichiers en excluant les dossiers '.' '..' et 'vehicules'
            $files = array_diff(scandir($dir), array('.', '..', 'vehicules'));
            foreach($files as $file): ?>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img src="<?= $dir . $file ?>" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Image">
                    </div>
                </div>
            <?php endforeach; 
        } ?>
    </div>

    <div class="card p-4">
        <h3>📊 Bienvenue sur votre Dashboard</h3>
        <p>Utilisez le menu latéral pour naviguer dans votre ERP.</p>
    </div>
</div>

<style>
.trap-left { width: 20%; height: 80px; background: linear-gradient(45deg, #2c3e50, #4ca1af); clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%); color: white; }
.trap-right { width: 80%; height: 80px; background: linear-gradient(45deg, #1e3c72, #2a5298); clip-path: polygon(2% 0, 100% 0, 98% 100%, 0% 100%); color: white; }
</style>
