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
            <p class="text-sm text-neutral-muted max-w-sm leading-relaxed" data-i18n="footer_desc">
                Studio kreatif yang fokus pada desain 2D &amp; 3D — poster, branding,
                render produk, hingga visual kampanye yang bikin brandmu tampil beda.
            </p>
        </div>

        <div>
            <h3 class="font-display font-semibold text-accent mb-4" data-i18n="footer_menu">Menu</h3>
            <ul class="space-y-2 text-sm text-neutral-muted">
                <li><a href="#services" class="hover:text-primary transition" data-i18n="nav_services">Layanan</a></li>
                <li><a href="#portfolio" class="hover:text-primary transition" data-i18n="nav_portfolio">Portofolio</a></li>
                <li><a href="#about" class="hover:text-primary transition" data-i18n="nav_about">Tentang</a></li>
                <li><a href="#contact" class="hover:text-primary transition" data-i18n="nav_contact">Kontak</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-display font-semibold text-accent mb-4" data-i18n="footer_social">Sosial Media</h3>
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
            &copy; <?= (int)$config['site']['year'] ?> <?= htmlspecialchars($config['site']['name']) ?>. <span data-i18n="footer_copyright">Semua karya adalah hak cipta masing-masing klien.</span>
        </p>
    </div>
</footer>

<script src="/assets/js/translations.js?v=2"></script>
<script src="/assets/js/script.js?v=2"></script>
