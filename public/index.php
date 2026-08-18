<?php
$config = include __DIR__ . '/../src/config.php';
$pageTitle = 'SEMUT Studio — Desain 2D & 3D';

$services = [
    [
        'icon'  => 'M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9',
        'title' => '3D Modeling',
        'desc'  => 'Pembuatan model 3D karakter dan produk dengan detail tinggi untuk berbagai kebutuhan.',
    ],
    [
        'icon'  => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01',
        'title' => 'Texturing',
        'desc'  => 'Pemberian material dan tekstur pada model 3D agar terlihat realistis dan sesuai referensi.',
    ],
    [
        'icon'  => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1',
        'title' => 'Rigging',
        'desc'  => 'Pembuatan skeleton dan controller agar model 3D bisa digerakkan dan dianimasikan.',
    ],
    [
        'icon'  => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
        'title' => 'VRChat Setup (Unity)',
        'desc'  => 'Setup avatar untuk VRChat di Unity termasuk optimasi polygon, material, dan konfigurasi VRChat SDK.',
    ],
    [
        'icon'  => 'M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664zM21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        'title' => 'GoGoLoco Setup',
        'desc'  => 'Setup sistem GoGoLoco untuk animasi locomotion realistis pada avatar VRChat.',
    ],
];

$marquee = ['3D Modeling', 'Texturing', 'Rigging', 'VRChat Setup', 'GoGoLoco'];

$projects = [
    [
        'id'    => 1,
        'title' => '(Example) Poster Kampanye Produk',
        'cat'   => '2D',
        'desc'  => 'Poster promosi produk dengan komposisi tipografi & warna bold.',
        'image' => '/assets/images/works/VB.png',
    ],
    [
        'id'    => 2,
        'title' => '(Example) Mockup Kemasan 3D',
        'cat'   => '3D',
        'desc'  => 'Render kemasan produk 3D untuk presentasi klien.',
        'image' => '/assets/images/works/VB.png',
    ],
    [
        'id'    => 3,
        'title' => '(Example) Identitas Visual Brand',
        'cat'   => '2D',
        'desc'  => 'Logo & guideline sederhana untuk brand baru.',
        'image' => '/assets/images/works/VB.png',
    ],
    [
        'id'    => 4,
        'title' => '(Example) Render Produk 3D',
        'cat'   => '3D',
        'desc'  => 'Visualisasi produk untuk katalog dan iklan digital.',
        'image' => '/assets/images/works/VB.png',
    ],
    [
        'id'    => 5,
        'title' => '(Example) Social Media Kit',
        'cat'   => '2D',
        'desc'  => 'Template feed & story untuk konsistensi konten.',
        'image' => '/assets/images/works/VB.png',
    ],
    [
        'id'    => 6,
        'title' => '(Example) Key Visual Event 3D ',
        'cat'   => '3D',
        'desc'  => 'Key visual acara dengan elemen 3D yang immersive.',
        'image' => '/assets/images/works/VB.png',
    ],
];

$testimonials = [
    [
        'quote' => '(Example) Kerja sama yang rapi dan hasil desainnya jauh di atas ekspektasi. Komunikasi cepat dan selalu on time.',
        'full'  => '(Example) Kerja sama dengan SEMUT Studio benar-benar rapi dari awal sampai akhir. Brief dipahami dengan baik, revisi ditangani cepat, dan hasil desainnya jauh di atas ekspektasi kami. Komunikasi selalu cepat dan proyek dikerjakan on time, jadi tim kami bisa langsung memakai asetnya untuk kebutuhan packaging dan promosi tanpa hambatan.',
        'name'  => '(Example) Rizky Ramadhan',
        'role'  => 'Founder, Minuman Kemasan',
    ],
    [
        'quote' => '(Example) Visual 3D produknya bikin katalog kami keliatan premium. Klien kami juga banyak yang melirik hasil render-nya.',
        'full'  => '(Example) Hasil render 3D produknya benar-benar bikin katalog kami keliatan premium. Material, pencahayaan, sampai detail kecil diperhatikan, jadi produk terlihat hidup dan menggugah selera. Banyak klien kami yang akhirnya melirik produk lewat visual yang ditampilkan. Kami puas dan pasti akan kerja sama lagi untuk kampanye berikutnya.',
        'name'  => '(Example) Dewi Lestari',
        'role'  => 'Marketing Manager, F&B Brand',
    ],
    [
        'quote' => '(Example) Dari logo sampai social media kit, semuanya konsisten dan siap dipakai. Recommended untuk brand yang baru mulai.',
        'full'  => '(Example) Dari logo sampai social media kit, semuanya dikerjakan dengan konsisten dan hasilnya siap pakai langsung. SEMUT Studio memahami bahwa brand baru butuh identitas yang jelas, jadi setiap elemen dibuat dengan arahan yang terstruktur. Sangat direkomendasikan untuk bisnis yang baru mulai membangun brand.',
        'name'  => '(Example) Andika Pratama',
        'role'  => 'Owner, Online Store',
    ],
];
?>
<?php include __DIR__ . '/../src/partials/header.php'; ?>

<main>
    <!-- ===================== HERO ===================== -->
    <section id="home" class="relative min-h-screen flex items-center overflow-hidden">
        <div class="mx-auto max-w-6xl px-5 pt-28 pb-16 grid gap-12 lg:grid-cols-2 lg:items-center">
            <div>
                <p class="inline-flex items-center gap-2 rounded-full border border-neutral-line bg-neutral-panel px-4 py-1.5 text-xs font-semibold text-neutral-soft shadow-sm reveal">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    Desain 2D &amp; 3D · Buka Order
                </p>
                <h1 class="mt-6 font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-accent leading-[1.1] reveal">
                    Desain Karakter & Visual <br>
                     <span class="relative text-primary">Produk 2D & 3D
                        <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 120 10" fill="none" preserveAspectRatio="none">
                            <path d="M2 7C30 2 80 2 118 6" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.5"/>
                        </svg>
                    </span>
                </h1>
                <p class="mt-7 text-neutral-soft leading-relaxed max-w-lg reveal">
                    Kami membantu menyediakan aset karakter 2D, 3D, dan video promosi yang siap digunakan untuk kebutuhan animasi maupun marketing.
                </p>
                <div class="mt-9 flex flex-wrap gap-4 reveal">
                    <a href="#portfolio" class="rounded-full bg-primary hover:bg-secondary text-neutral font-semibold px-7 py-3 transition">
                        Lihat Portofolio
                    </a>
                    <a href="#contact" class="rounded-full border border-neutral-line hover:border-primary hover:text-primary text-accent font-semibold px-7 py-3 transition">
                        Diskusi Proyek
                    </a>
                </div>
                <div class="mt-12 grid grid-cols-3 gap-6 max-w-md reveal">
                    <div>
                        <p class="font-display text-3xl font-bold text-primary">50+</p>
                        <p class="text-xs text-neutral-soft mt-1">Proyek Selesai</p>
                    </div>
                    <div>
                        <p class="font-display text-3xl font-bold text-primary">40+</p>
                        <p class="text-xs text-neutral-soft mt-1">Klien Puas</p>
                    </div>
                    <div>
                        <p class="font-display text-3xl font-bold text-primary">4+</p>
                        <p class="text-xs text-neutral-soft mt-1">Tahun Berkarya</p>
                    </div>
                </div>
            </div>

            <div class="relative reveal">
                <div class="rounded-[2rem] border border-neutral-line bg-neutral-panel p-8 sm:p-12">
                    <div class="aspect-[4/3] rounded-2xl bg-neutral-sand flex items-center justify-center overflow-hidden">
                        <img src="/assets/images/works/logo-ant.png"
                             alt="Logo SEMUT Studio"
                             class="h-16 sm:h-20 w-auto">
                    </div>
                    <p class="mt-6 text-center font-display font-semibold text-accent">SEMUT Studio</p>
                    <p class="text-center text-xs text-neutral-soft mt-1">Desain 2D &amp; 3D · Banjarnegara, Jawa Tengah Indonesia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== MARQUEE ===================== -->
    <div class="marquee border-y border-neutral-line bg-neutral-panel/40 overflow-hidden py-5" aria-hidden="true">
        <div class="marquee-track flex w-max animate-marquee gap-10 items-center">
            <?php for ($i = 0; $i < 2; $i++): ?>
                <?php foreach ($marquee as $m): ?>
                    <span class="flex items-center gap-10 text-sm font-semibold uppercase tracking-widest text-neutral-soft whitespace-nowrap">
                        <?= htmlspecialchars($m) ?>
                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                    </span>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <!-- ===================== LAYANAN ===================== -->
    <section id="services" class="py-24">
        <div class="mx-auto max-w-6xl px-5">
            <div class="flex items-end justify-between flex-wrap gap-4">
                <div>
                    <p class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-primary reveal">
                        <span class="w-8 h-px bg-primary"></span> Layanan
                    </p>
                    <h2 class="mt-3 font-display text-3xl sm:text-4xl font-bold text-accent reveal">Yang Kami Kerjakan</h2>
                </div>
                <p class="text-base text-neutral-soft max-w-xs reveal">Mulai dari satu poster sampai satu sistem identitas brand — semua dikerjakan dengan standar yang sama.</p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2">
                <?php foreach ($services as $s): ?>
                <div class="reveal group glow-click rounded-3xl border border-neutral-line bg-neutral-panel p-8 hover:-translate-y-1 transition">
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary flex items-center justify-center group-hover:bg-primary group-hover:text-neutral transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="<?= htmlspecialchars($s['icon']) ?>"/>
                        </svg>
                    </div>
                    <h3 class="mt-6 font-display font-semibold text-accent text-xl"><?= htmlspecialchars($s['title']) ?></h3>
                    <p class="mt-2 text-base text-neutral-soft leading-relaxed"><?= htmlspecialchars($s['desc']) ?></p>
                    <a href="#contact" class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary group-hover:gap-3 transition-all">
                        Mulai diskusi
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M6 12h12"/></svg>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===================== PORTOFOLIO ===================== -->
    <section id="portfolio" class="relative py-24 bg-neutral-panel border-y border-neutral-line overflow-hidden">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-primary/15 blur-[110px]"></div>
            <div class="absolute top-1/4 -right-28 w-[28rem] h-[28rem] rounded-full bg-secondary/10 blur-[130px]"></div>
            <div class="absolute bottom-0 left-1/3 w-80 h-80 rounded-full bg-neutral-soft/10 blur-[100px]"></div>
        </div>
        <div class="relative mx-auto max-w-6xl px-5">
            <div class="flex items-end justify-between flex-wrap gap-4">
                <div>
                    <p class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-primary reveal">
                        <span class="w-8 h-px bg-primary"></span> Portofolio
                    </p>
                    <h2 class="mt-3 font-display text-3xl sm:text-4xl font-bold text-accent reveal">Karya Pilihan</h2>
                </div>

                <div class="flex flex-wrap gap-2 reveal" id="filterBar">
                    <button class="filter-btn active rounded-full px-5 py-2 text-sm font-semibold transition" data-filter="all">Semua</button>
                    <button class="filter-btn rounded-full px-5 py-2 text-sm font-semibold transition" data-filter="2D">2D</button>
                    <button class="filter-btn rounded-full px-5 py-2 text-sm font-semibold transition" data-filter="3D">3D</button>
                </div>
            </div>

            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3" id="gallery">
                <?php foreach ($projects as $p): ?>
                <article class="project-card tilt-card reveal group rounded-3xl"
                         data-category="<?= htmlspecialchars($p['cat']) ?>">
                    <div class="tilt-glass pointer-events-none" aria-hidden="true"></div>
                    <button type="button" class="relative z-10 w-full block text-left project-open"
                            data-title="<?= htmlspecialchars($p['title']) ?>"
                            data-desc="<?= htmlspecialchars($p['desc']) ?>"
                            data-cat="<?= htmlspecialchars($p['cat']) ?>"
                            data-image="<?= htmlspecialchars($p['image'] ?? '') ?>">
                        <div class="aspect-[4/3] overflow-hidden rounded-t-3xl">
                            <?php if (!empty($p['image'])): ?>
                                <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>"
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <?php else: ?>
                                <div class="w-full h-full bg-neutral-sand flex items-center justify-center">
                                    <span class="font-display font-bold text-5xl text-primary/50"><?= htmlspecialchars($p['cat']) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tilt-body p-5 flex items-center justify-between gap-3">
                            <div>
                                <span class="text-xs font-semibold uppercase tracking-wider text-primary"><?= htmlspecialchars($p['cat']) ?></span>
                                <h3 class="mt-0.5 font-display font-semibold text-accent"><?= htmlspecialchars($p['title']) ?></h3>
                            </div>
                            <span class="w-9 h-9 shrink-0 rounded-full border border-neutral-line bg-neutral-panel text-neutral-soft group-hover:bg-primary group-hover:text-neutral group-hover:border-primary flex items-center justify-center transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l-5 5-5-5M17 15l-5 5-5-5"/></svg>
                            </span>
                        </div>
                    </button>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===================== TENTANG ===================== -->
    <section id="about" class="py-24">
        <div class="mx-auto max-w-6xl px-5 grid gap-12 lg:grid-cols-2 lg:items-center">
            <div class="relative reveal">
                <div class="aspect-square max-w-md rounded-[2rem] border border-neutral-line bg-neutral-sand flex flex-col items-center justify-center gap-4">
                    <img src="/assets/images/works/logo-ant.png" alt="Logo SEMUT Studio" class="h-12 w-auto">
                    <p class="font-display font-semibold text-accent">SEMUT Studio</p>
                </div>
                <div class="absolute -bottom-6 left-8 rounded-2xl border border-neutral-line bg-neutral-panel px-5 py-3 shadow-md">
                    <p class="font-display font-bold text-accent text-lg leading-none">Est. 2025</p>
                    <p class="text-xs text-neutral-soft mt-0.5">Berkarya sejak</p>
                </div>
            </div>
            <div>
                <p class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-primary reveal">
                    <span class="w-8 h-px bg-primary"></span> Tentang
                </p>
                <h2 class="mt-3 font-display text-3xl sm:text-4xl font-bold text-accent reveal">Di Balik SEMUT Studio</h2>
                <p class="mt-6 text-neutral-soft leading-relaxed reveal">
                    SEMUT Studio adalah studio desain independen yang percaya bahwa visual yang baik
                    bukan cuma soal terlihat bagus, tapi juga menyampaikan pesan dengan jelas.
                    Kami bekerja dekat dengan klien untuk memahami brand, target audiens,
                    dan tujuan bisnis sebelum memulai proses desain.
                </p>
                <ul class="mt-8 space-y-4 reveal">
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 w-6 h-6 rounded-full bg-primary text-neutral flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span class="text-base text-accent/80">Proses jelas: brief → konsep → revisi → final</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 w-6 h-6 rounded-full bg-primary text-neutral flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span class="text-base text-accent/80">File siap pakai untuk cetak dan digital</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 w-6 h-6 rounded-full bg-primary text-neutral flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span class="text-base text-accent/80">Komunikasi responsif dari awal sampai selesai</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ===================== TESTIMONI ===================== -->
    <section id="testimonials" class="relative py-24 bg-neutral-panel border-y border-neutral-line overflow-hidden">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-primary/15 blur-[110px]"></div>
            <div class="absolute bottom-0 -left-28 w-[28rem] h-[28rem] rounded-full bg-secondary/10 blur-[130px]"></div>
            <div class="absolute top-1/2 left-1/2 w-80 h-80 rounded-full bg-neutral-soft/10 blur-[100px]"></div>
        </div>
        <div class="relative mx-auto max-w-6xl px-5">
            <p class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-primary reveal">
                <span class="w-8 h-px bg-primary"></span> Testimoni
            </p>
            <h2 class="mt-3 font-display text-3xl sm:text-4xl font-bold text-accent reveal">Review Pelanggan</h2>
            <div id="testimonialsGrid" class="mt-12 grid gap-6 md:grid-cols-3">
                <?php foreach ($testimonials as $t): ?>
                <figure class="tilt-card tilt-subtle reveal group rounded-3xl">
                    <div class="tilt-glass pointer-events-none" aria-hidden="true"></div>
                    <button type="button" class="review-open relative z-10 w-full block text-left p-7"
                            data-quote="<?= htmlspecialchars($t['quote']) ?>"
                            data-full="<?= htmlspecialchars($t['full'] ?? $t['quote']) ?>"
                            data-name="<?= htmlspecialchars($t['name']) ?>"
                            data-role="<?= htmlspecialchars($t['role']) ?>">
                        <div class="tilt-body">
                            <div class="text-primary mb-4 text-lg tracking-widest" aria-hidden="true">★★★★★</div>
                            <p class="text-base text-accent/80 leading-relaxed line-clamp-4">"<?= htmlspecialchars($t['quote']) ?>"</p>
                            <div class="mt-6 border-t border-neutral-line pt-4">
                                <p class="font-semibold text-accent text-base"><?= htmlspecialchars($t['name']) ?></p>
                                <p class="text-xs text-neutral-soft mt-0.5"><?= htmlspecialchars($t['role']) ?></p>
                            </div>
                            <span class="mt-4 inline-flex items-center gap-1.5 text-xs font-semibold text-primary group-hover:gap-3 transition-all">
                                Baca review lengkap
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/></svg>
                            </span>
                        </div>
                    </button>
                </figure>
                <?php endforeach; ?>
            </div>

            <div class="mt-14 text-center reveal">
                <button id="reviewFormToggle" type="button" aria-expanded="false"
                        class="inline-flex items-center gap-2 rounded-full border border-neutral-line hover:border-primary hover:text-primary text-accent font-semibold px-7 py-3 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Tulis Review
                </button>
            </div>

            <div id="reviewFormWrap" class="hidden mt-10 max-w-2xl mx-auto">
                <div class="rounded-3xl border border-neutral-line bg-neutral-panel p-8">
                    <h3 class="font-display font-semibold text-accent text-xl">Bagikan Pengalamanmu</h3>
                    <p class="mt-2 text-sm text-neutral-soft">Sudah pernah bekerja sama? Ceritakan pengalamanmu — review akan tampil setelah disetujui admin.</p>
                    <form id="reviewForm" class="mt-6 space-y-5">
                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="rfName" class="block text-sm font-medium text-accent mb-2">Nama</label>
                                <input type="text" id="rfName" name="name" required
                                       class="w-full rounded-xl bg-neutral border border-neutral-line px-4 py-3 text-sm placeholder-neutral-soft/50 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20"
                                       placeholder="Nama kamu">
                            </div>
                            <div>
                                <label for="rfRole" class="block text-sm font-medium text-accent mb-2">Jabatan / Brand</label>
                                <input type="text" id="rfRole" name="role"
                                       class="w-full rounded-xl bg-neutral border border-neutral-line px-4 py-3 text-sm placeholder-neutral-soft/50 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20"
                                       placeholder="cth: Owner, Online Store">
                            </div>
                        </div>
                        <div>
                            <label for="rfRating" class="block text-sm font-medium text-accent mb-2">Rating</label>
                            <select id="rfRating" name="rating" class="w-full rounded-xl bg-neutral border border-neutral-line px-4 py-3 text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                                <option value="5">5 — Luar biasa</option>
                                <option value="4">4 — Bagus</option>
                                <option value="3">3 — Cukup</option>
                                <option value="2">2 — Kurang</option>
                                <option value="1">1 — Buruk</option>
                            </select>
                        </div>
                        <div>
                            <label for="rfReview" class="block text-sm font-medium text-accent mb-2">Review</label>
                            <textarea id="rfReview" name="review" rows="4" required
                                      class="w-full rounded-xl bg-neutral border border-neutral-line px-4 py-3 text-sm placeholder-neutral-soft/50 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 resize-none"
                                      placeholder="Ceritakan pengalamanmu bekerja dengan kami..."></textarea>
                        </div>
                        <button type="submit"
                                class="w-full rounded-xl bg-primary hover:bg-secondary text-neutral font-semibold px-6 py-3.5 transition">
                            Kirim Review
                        </button>
                        <p id="reviewStatus" class="text-sm text-center hidden"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== KONTAK ===================== -->
    <section id="contact" class="py-24">
        <div class="mx-auto max-w-6xl px-5 grid gap-12 lg:grid-cols-2">
            <div>
                <p class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-primary reveal">
                    <span class="w-8 h-px bg-primary"></span> Kontak
                </p>
                <h2 class="mt-3 font-display text-3xl sm:text-4xl font-bold text-accent reveal">Mulai Proyekmu Sekarang</h2>
                <p class="mt-6 text-neutral-soft leading-relaxed reveal">
                    Ceritakan kebutuhan desainmu. Kami akan membalas dalam 1×24 jam
                    dengan estimasi biaya dan timeline.
                </p>
                <div class="mt-8 space-y-4 reveal">
                    <a href="mailto:<?= htmlspecialchars($config['social']['email']) ?>" class="flex items-center gap-4 text-sm text-accent hover:text-primary transition group">
                        <span class="w-11 h-11 rounded-2xl bg-primary/10 text-primary flex items-center justify-center group-hover:bg-primary group-hover:text-neutral transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </span>
                        <span>
                            <span class="block text-xs text-neutral-soft">Email</span>
                            <?= htmlspecialchars($config['social']['email']) ?>
                        </span>
                    </a>
                    <a href="<?= htmlspecialchars($config['social']['instagram']) ?>" class="flex items-center gap-4 text-sm text-accent hover:text-primary transition group" target="_blank" rel="noopener">
                        <span class="w-11 h-11 rounded-2xl bg-primary/10 text-primary flex items-center justify-center group-hover:bg-primary group-hover:text-neutral transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a6 6 0 016-6h6a6 6 0 016 6v6a6 6 0 01-6 6H9a6 6 0 01-6-6V9z"/><circle cx="12" cy="12" r="3"/><circle cx="17" cy="7" r="1"/></svg>
                        </span>
                        <span>
                            <span class="block text-xs text-neutral-soft">Instagram</span>
                            @semutstudio25
                        </span>
                    </a>
                    <a href="<?= htmlspecialchars($config['social']['fiverr']) ?>" class="flex items-center gap-4 text-sm text-accent hover:text-primary transition group" target="_blank" rel="noopener">
                        <span class="w-11 h-11 rounded-2xl bg-primary/10 text-primary flex items-center justify-center group-hover:bg-primary group-hover:text-neutral transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016A3.001 3.001 0 0021 9.35m-18 0V5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25v4.1"/></svg>
                        </span>
                        <span>
                            <span class="block text-xs text-neutral-soft">Fiverr</span>
                            fiverr.com/semutstudio
                        </span>
                    </a>
                </div>
            </div>

            <form id="contactForm" class="reveal rounded-3xl border border-neutral-line bg-neutral-panel p-8 space-y-5">
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="cfName" class="block text-sm font-medium text-accent mb-2">Nama</label>
                        <input type="text" id="cfName" name="name" required
                               class="w-full rounded-xl bg-neutral border border-neutral-line px-4 py-3 text-sm placeholder-neutral-soft/50 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20"
                               placeholder="Nama kamu">
                    </div>
                    <div>
                        <label for="cfEmail" class="block text-sm font-medium text-accent mb-2">Email</label>
                        <input type="email" id="cfEmail" name="email" required
                               class="w-full rounded-xl bg-neutral border border-neutral-line px-4 py-3 text-sm placeholder-neutral-soft/50 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20"
                               placeholder="email@kamu.com">
                    </div>
                </div>
                <div>
                    <label for="cfSubject" class="block text-sm font-medium text-accent mb-2">Jenis Proyek</label>
                    <select id="cfSubject" name="subject" class="w-full rounded-xl bg-neutral border border-neutral-line px-4 py-3 text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                        <option value="Desain 2D">Desain 2D</option>
                        <option value="Desain 3D">Desain 3D</option>
                        <option value="Branding">Branding Video</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label for="cfMessage" class="block text-sm font-medium text-accent mb-2">Pesan</label>
                    <textarea id="cfMessage" name="message" rows="4" required
                              class="w-full rounded-xl bg-neutral border border-neutral-line px-4 py-3 text-sm placeholder-neutral-soft/50 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 resize-none"
                              placeholder="Ceritakan kebutuhanmu..."></textarea>
                </div>
                <button type="submit"
                        class="w-full rounded-xl bg-primary hover:bg-secondary text-neutral font-semibold px-6 py-3.5 transition">
                    Kirim Pesan
                </button>
                <p id="formStatus" class="text-sm text-center hidden"></p>
            </form>
        </div>
    </section>
</main>

<!-- ===================== LIGHTBOX ===================== -->
<div id="lightbox" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/70 backdrop-blur-sm p-5" role="dialog" aria-modal="true" aria-label="Detail karya">
    <div class="relative max-w-3xl w-full rounded-3xl border border-neutral-line bg-neutral-panel p-6 sm:p-8 shadow-2xl">
        <button id="lightboxClose" class="absolute top-4 right-4 w-9 h-9 rounded-full bg-neutral text-neutral-soft hover:text-primary flex items-center justify-center transition" aria-label="Tutup">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div id="lightboxMedia" class="aspect-[16/9] rounded-2xl overflow-hidden bg-neutral-sand flex items-center justify-center mb-6">
            <img id="lightboxImg" class="w-full h-full object-cover hidden" alt="">
            <span id="lightboxPlaceholder" class="font-display font-bold text-6xl text-primary/40"></span>
        </div>
        <span id="lightboxCat" class="text-xs font-semibold uppercase tracking-wider text-primary"></span>
        <h3 id="lightboxTitle" class="mt-1 font-display text-2xl font-bold text-accent"></h3>
        <p id="lightboxDesc" class="mt-3 text-sm text-neutral-soft leading-relaxed"></p>
    </div>
</div>

<!-- ===================== REVIEW LIGHTBOX ===================== -->
<div id="reviewLightbox" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/70 backdrop-blur-sm p-5" role="dialog" aria-modal="true" aria-label="Detail review">
    <div class="relative max-w-2xl w-full rounded-3xl border border-neutral-line bg-neutral-panel p-6 sm:p-8 shadow-2xl">
        <button id="reviewLightboxClose" class="absolute top-4 right-4 w-9 h-9 rounded-full bg-neutral text-neutral-soft hover:text-primary flex items-center justify-center transition" aria-label="Tutup">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="text-primary mb-5 text-lg tracking-widest" aria-hidden="true">★★★★★</div>
        <blockquote id="reviewLightboxFull" class="text-base text-accent/80 leading-relaxed"></blockquote>
        <div class="mt-6 border-t border-neutral-line pt-5 flex items-center gap-3">
            <span class="w-10 h-10 shrink-0 rounded-full bg-primary/10 text-primary flex items-center justify-center font-display font-bold text-sm">
                <span id="reviewLightboxInitial"></span>
            </span>
            <div>
                <p id="reviewLightboxName" class="font-semibold text-accent text-base"></p>
                <p id="reviewLightboxRole" class="text-xs text-neutral-soft mt-0.5"></p>
            </div>
        </div>
    </div>
</div>

<!-- ===================== BACK TO TOP ===================== -->
<button id="backToTop" class="back-to-top" aria-label="Kembali ke atas">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/></svg>
</button>

<?php include __DIR__ . '/../src/partials/footer.php'; ?>

