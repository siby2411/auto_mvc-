<div class="art-bg"></div>

<style>
:root { --glass: rgba(255, 255, 255, 0.07); --accent: #00d2ff; }
body { background: #0f172a; color: #e2e8f0; font-family: 'Segoe UI', sans-serif; min-height: 100vh; }

.art-bg {
    position: fixed; top: -100px; right: -100px; width: 400px; height: 400px;
    background: linear-gradient(45deg, #1e3c72, var(--accent));
    clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 80%);
    filter: blur(100px); z-index: -1;
}

.glass-card {
    background: var(--glass);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    margin-bottom: 2rem;
}

.btn-accent { background: var(--accent); color: #000; font-weight: bold; border: none; }
.text-accent { color: var(--accent); }
.table { color: #fff !important; }
</style>

<div class="container-fluid mt-4">
    <div class="glass-card">
        <h2 class="text-accent mb-4">TITRE DE VOTRE PAGE</h2>
        </div>
</div>
