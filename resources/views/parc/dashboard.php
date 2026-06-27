<div class="container-fluid">
    
    <?php if ($mode === 'admin'): ?>
    <div class="card p-3 mb-4 shadow-sm border-primary">
        <h5>🚀 Gestion Marketing (Mode Administrateur)</h5>
        <form action="?url=upload_marketing" method="POST" enctype="multipart/form-data" class="row g-2">
            <div class="col-md-10">
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark w-100">Upload</button>
            </div>
        </form>
    </div>
    <?php endif; ?>

    <div class="d-flex gap-3 mb-4">
        <div class="trap-left d-flex align-items-center justify-content-center">
            <span class="fw-bold">OMEGA</span>
        </div>
        <div class="trap-right d-flex align-items-center justify-content-center">
            <p class="mb-0 fw-bold">🚀 SYSTÈMES INTELLIGENTS DE GESTION AUTOMOBILE</p>
        </div>
    </div>

    <div class="brands-section mb-4 text-center">
        <div class="row align-items-center">
            <div class="col-4"><img src="https://logodownload.org/wp-content/uploads/2014/04/mercedes-benz-logo-1.png" alt="Mercedes" class="brand-logo"></div>
            <div class="col-4"><img src="https://logodownload.org/wp-content/uploads/2014/04/bmw-logo-1.png" alt="BMW" class="brand-logo"></div>
            <div class="col-4"><img src="https://logodownload.org/wp-content/uploads/2014/04/lamborghini-logo.png" alt="Lamborghini" class="brand-logo"></div>
        </div>
    </div>

    <div class="row mb-4">
        <?php 
        $dir = "public/uploads/";
        if (is_dir($dir)) {
            $files = array_diff(scandir($dir), array('.', '..', 'vehicules'));
            foreach($files as $file): ?>
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= $dir . $file ?>" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Image">
                    </div>
                </div>
            <?php endforeach; 
        } ?>
    </div>
</div>

<style>
.trap-left { width: 20%; height: 80px; background: linear-gradient(45deg, #2c3e50, #4ca1af); clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%); color: white; }
.trap-right { width: 80%; height: 80px; background: linear-gradient(45deg, #1e3c72, #2a5298); clip-path: polygon(2% 0, 100% 0, 98% 100%, 0% 100%); color: white; }
.brands-section { background: linear-gradient(to right, #f8f9fa, #e9ecef); padding: 20px; border-radius: 15px; border: 1px solid #dee2e6; }
.brand-logo { height: 50px; opacity: 0.7; transition: 0.3s; }
.brand-logo:hover { opacity: 1; }
</style>
