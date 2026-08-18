<?php
$config = include __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? $config['site']['name']) ?></title>

    <meta name="description" content="SEMUT Studio — Jasa 3D Modeling, Texturing, Rigging, VRChat Setup, dan GoGoLoco Setup. Hubungi kami untuk proyek kreatifmu.">
    <meta name="author" content="<?= htmlspecialchars($config['site']['name']) ?>">
    <meta name="keywords" content="3D modeling, texturing, rigging, VRChat avatar, GoGoLoco, jasa 3D, desain 3D, Banjarnegara">

    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle ?? $config['site']['name']) ?>">
    <meta property="og:description" content="Jasa 3D Modeling, Texturing, Rigging, VRChat Setup, dan GoGoLoco Setup.">
    <meta property="og:image" content="/assets/images/og/og-default.png">
    <meta property="og:url" content="https://semutstudio.com/">
    <meta property="og:site_name" content="SEMUT Studio">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle ?? $config['site']['name']) ?>">
    <meta name="twitter:description" content="Jasa 3D Modeling, Texturing, Rigging, VRChat Setup, dan GoGoLoco Setup.">
    <meta name="twitter:image" content="/assets/images/og/og-default.png">

    <link rel="canonical" href="https://semutstudio.com/">

    <link rel="icon" type="image/png" href="/assets/images/works/cropped-SEMUT-STU-1.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        /* ===== 4 struktur warna (variabel CSS di style.css) ===== */
                        neutral: {
                            DEFAULT: 'var(--c-bg)',      /* bg utama */
                            panel:   'var(--c-panel)',   /* kartu/panel */
                            sand:    'var(--c-sand)',    /* bg subtil */
                            line:    'var(--c-line)',    /* border */
                            soft:    'var(--c-soft)',    /* teks sekunder */
                            muted:   'var(--c-muted)',   /* teks footer */
                            cream:   'var(--c-cream)',   /* teks footer terang */
                            deepest: 'var(--c-deepest)', /* footer */
                            border:  'var(--c-border)'   /* border footer */
                        },
                        primary:   'var(--c-primary)',   /* warna utama brand (coral) */
                        secondary: 'var(--c-secondary)', /* pendukung primary (hover) */
                        accent:    'var(--c-accent)'     /* highlight teks */
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'Inter', 'sans-serif']
                    },
                    /* Skala golden ratio (1.618): 12 → 16 → 20 → 26 → 42 → 68 px */
                    fontSize: {
                        xs:   ['0.75rem',  '1.1rem'],   /* 12 */
                        sm:   ['0.875rem', '1.35rem'],  /* 14 */
                        base: ['1rem',     '1.6rem'],   /* 16 */
                        lg:   ['1.25rem',  '1.8rem'],   /* 20 */
                        xl:   ['1.618rem', '2.1rem'],   /* 26 */
                        '2xl': ['1.618rem', '2.1rem'],  /* 26 */
                        '3xl': ['2.618rem', '3rem'],    /* 42 */
                        '4xl': ['2.618rem', '3rem'],    /* 42 */
                        '5xl': ['3.25rem',  '3.6rem'],  /* 52 */
                        '6xl': ['4.236rem', '4.5rem']   /* 68 */
                    },
                    animation: {
                        marquee: 'marquee 28s linear infinite'
                    },
                    keyframes: {
                        marquee: {
                            from: { transform: 'translateX(0)' },
                            to:   { transform: 'translateX(-50%)' }
                        }
                    }
                }
            }
        }
    </script>

    <script>
        /* Terapkan tema sebelum halaman dicat (hindari flash) */
        (function () {
            var t = localStorage.getItem('theme');
            if (!t) {
                t = (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) ? 'light' : 'dark';
            }
            if (t === 'light') {
                document.documentElement.classList.add('theme-light');
            }
        })();
    </script>

    <script>
        /* Konfigurasi dari src/config.php (anon key boleh publik, RLS melindungi data) */
        window.SEMUT_CONFIG = {
            supabaseUrl: <?= json_encode($config['supabase']['url'] ?? '') ?>,
            supabaseAnonKey: <?= json_encode($config['supabase']['anon_key'] ?? '') ?>
        };
    </script>

    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="bg-neutral text-accent font-sans antialiased">

<a href="#home" class="sr-only focus:not-sr-only">Langsung ke konten</a>

<header class="fixed top-0 inset-x-0 z-50 border-b border-neutral-line bg-neutral/85 backdrop-blur-md">
    <nav class="mx-auto max-w-6xl px-5 h-16 flex items-center justify-between">
        <a href="#home" class="flex items-center gap-2.5" aria-label="Home">
            <img src="/assets/images/works/logo-ant.png"
                 alt=""
                 class="h-8 w-auto">
            <span class="font-display font-bold text-lg text-accent tracking-tight whitespace-nowrap">SEMUT Studio</span>
        </a>

        <button id="menuToggle" class="lg:hidden p-2" aria-label="Buka menu" aria-expanded="false">
            <svg id="menuIconOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg id="menuIconClose" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <ul id="navMenu" class="hidden lg:flex items-center gap-8 text-sm font-medium">
            <li><a href="#home" class="nav-link hover:text-primary transition">Home</a></li>
            <li><a href="#services" class="nav-link hover:text-primary transition">Layanan</a></li>
            <li><a href="#portfolio" class="nav-link hover:text-primary transition">Portofolio</a></li>
            <li><a href="#about" class="nav-link hover:text-primary transition">Tentang</a></li>
            <li><a href="#contact" class="nav-link hover:text-primary transition">Kontak</a></li>
        </ul>

        <div class="flex items-center gap-3">
            <button id="themeToggle" type="button" class="theme-toggle" aria-label="Aktifkan mode terang" aria-pressed="true">
                <span class="theme-toggle-track" aria-hidden="true"></span>
                <span class="theme-toggle-knob" aria-hidden="true">
                    <span class="theme-face theme-face-moon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
                    </span>
                    <span class="theme-face theme-face-sun">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>
                    </span>
                </span>
            </button>

            <a href="#contact" class="hidden lg:inline-flex items-center gap-2 rounded-full bg-primary hover:bg-secondary text-neutral text-sm font-semibold px-5 py-2 transition">
                Mulai Proyek
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/>
                </svg>
            </a>
        </div>
    </nav>

    <ul id="mobileMenu" class="lg:hidden hidden border-t border-neutral-line bg-neutral/95 px-5 py-4 space-y-3 text-sm font-medium">
        <li><a href="#home" class="nav-link block py-2 hover:text-primary">Home</a></li>
        <li><a href="#services" class="nav-link block py-2 hover:text-primary">Layanan</a></li>
        <li><a href="#portfolio" class="nav-link block py-2 hover:text-primary">Portofolio</a></li>
        <li><a href="#about" class="nav-link block py-2 hover:text-primary">Tentang</a></li>
        <li><a href="#contact" class="nav-link block py-2 hover:text-primary">Kontak</a></li>
    </ul>
</header>
