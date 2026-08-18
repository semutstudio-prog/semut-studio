<?php
$config = include __DIR__ . '/../config.php';
?>
<footer class="bg-neutral-deepest text-neutral-cream">
    <div class="mx-auto max-w-6xl px-5 py-14 grid gap-10 md:grid-cols-4">
        <div class="md:col-span-2 space-y-4">
            <span class="flex items-center gap-2.5">
                <img src="/assets/images/works/logo-ant.png"
                     alt=""
                     class="h-8 w-auto">
                <span class="font-display font-bold text-lg text-accent tracking-tight whitespace-nowrap">SEMUT Studio</span>
            </span>
            <p class="text-sm text-neutral-muted max-w-sm leading-relaxed">
                Studio kreatif yang fokus pada desain 2D &amp; 3D — poster, branding,
                render produk, hingga visual kampanye yang bikin brandmu tampil beda.
            </p>
        </div>

        <div>
            <h3 class="font-display font-semibold text-accent mb-4">Menu</h3>
            <ul class="space-y-2 text-sm text-neutral-muted">
                <li><a href="#services" class="hover:text-primary transition">Layanan</a></li>
                <li><a href="#portfolio" class="hover:text-primary transition">Portofolio</a></li>
                <li><a href="#about" class="hover:text-primary transition">Tentang</a></li>
                <li><a href="#contact" class="hover:text-primary transition">Kontak</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-display font-semibold text-accent mb-4">Sosial Media</h3>
            <ul class="space-y-2 text-sm text-neutral-muted">
                <li><a href="<?= htmlspecialchars($config['social']['instagram']) ?>" class="hover:text-primary transition" target="_blank" rel="noopener">Instagram</a></li>
                <li><a href="<?= htmlspecialchars($config['social']['facebook']) ?>" class="hover:text-primary transition" target="_blank" rel="noopener">Facebook</a></li>
                <li><a href="<?= htmlspecialchars($config['social']['fiverr']) ?>" class="hover:text-primary transition" target="_blank" rel="noopener">Fiverr</a></li>
                <li><a href="<?= htmlspecialchars($config['social']['discord']) ?>" class="hover:text-primary transition" target="_blank" rel="noopener">Discord</a></li>
                <li><a href="mailto:<?= htmlspecialchars($config['social']['email']) ?>" class="hover:text-primary transition"><?= htmlspecialchars($config['social']['email']) ?></a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-neutral-border">
        <p class="mx-auto max-w-6xl px-5 py-5 text-xs text-neutral-soft text-center">
            &copy; <?= (int)$config['site']['year'] ?> <?= htmlspecialchars($config['site']['name']) ?>. Semua karya adalah hak cipta masing-masing klien.
        </p>
    </div>
</footer>

<script src="/assets/js/script.js"></script>
