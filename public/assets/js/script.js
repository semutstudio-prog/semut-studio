document.addEventListener('DOMContentLoaded', function () {

    /* ============ Tema terang/gelap ============ */
    var themeToggle = document.getElementById('themeToggle');
    var rootEl = document.documentElement;

    function applyTheme(light) {
        rootEl.classList.toggle('theme-light', light);
        if (themeToggle) {
            themeToggle.setAttribute('aria-pressed', String(!light));
            themeToggle.setAttribute('aria-label', light ? 'Aktifkan mode gelap' : 'Aktifkan mode terang');
        }
    }

    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            var isLight = rootEl.classList.toggle('theme-light');
            localStorage.setItem('theme', isLight ? 'light' : 'dark');
            themeToggle.setAttribute('aria-pressed', String(!isLight));
            themeToggle.setAttribute('aria-label', isLight ? 'Aktifkan mode gelap' : 'Aktifkan mode terang');
        });
    }

    /* ============ Mobile Menu ============ */
    var menuToggle = document.getElementById('menuToggle');
    var mobileMenu = document.getElementById('mobileMenu');
    var iconOpen = document.getElementById('menuIconOpen');
    var iconClose = document.getElementById('menuIconClose');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function () {
            var isOpen = mobileMenu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden', !isOpen);
            iconClose.classList.toggle('hidden', isOpen);
            menuToggle.setAttribute('aria-expanded', String(!isOpen));
        });
    }

    /* ============ Close mobile menu on nav link click ============ */
    document.querySelectorAll('#mobileMenu a').forEach(function (link) {
        link.addEventListener('click', function () {
            mobileMenu.classList.add('hidden');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
            menuToggle.setAttribute('aria-expanded', 'false');
        });
    });

    /* ============ Scroll Reveal (IntersectionObserver) ============ */
    var revealEls = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window && revealEls.length) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });
        revealEls.forEach(function (el) { revealObserver.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('visible'); });
    }

    /* ============ Glow saat klik kontainer ============ */
    document.querySelectorAll('.project-card, .glow-click').forEach(function (card) {
        card.addEventListener('mousedown', function () { card.classList.add('is-pressed'); });
        card.addEventListener('mouseup', function () { card.classList.remove('is-pressed'); });
        card.addEventListener('mouseleave', function () { card.classList.remove('is-pressed'); });
    });

    /* ============ Glass 3D Tilt Card ============ */
    document.querySelectorAll('.tilt-card').forEach(function (card) {
        var subtle = card.classList.contains('tilt-subtle');
        card.addEventListener('mousemove', function (e) {
            var rect = card.getBoundingClientRect();
            var px = (e.clientX - rect.left) / rect.width;
            var py = (e.clientY - rect.top) / rect.height;
            var strength = subtle ? 6 : 16;
            var rotateY = (px - 0.5) * strength;
            var rotateX = (0.5 - py) * strength;
            var lift = subtle ? '-3px' : '-8px';
            var scale = subtle ? '1.01' : '1.03';
            card.classList.add('is-moving');
            card.style.transform = 'perspective(750px) rotateX(' + rotateX.toFixed(2) + 'deg) rotateY(' + rotateY.toFixed(2) + 'deg) translateY(' + lift + ') scale(' + scale + ')';
            card.style.setProperty('--mx', (px * 100) + '%');
            card.style.setProperty('--my', (py * 100) + '%');
        });
        card.addEventListener('mouseleave', function () {
            card.classList.remove('is-moving');
            card.style.transform = '';
            card.style.setProperty('--mx', '50%');
            card.style.setProperty('--my', '50%');
        });
    });

    /* ============ Portfolio Filter ============ */
    var filterBtns = document.querySelectorAll('.filter-btn');
    var projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterBtns.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');

            var filter = btn.getAttribute('data-filter');
            projectCards.forEach(function (card) {
                var cat = card.getAttribute('data-category');
                var show = filter === 'all' || cat === filter;
                card.classList.toggle('hidden-card', !show);
                if (show) {
                    card.classList.remove('fade-in');
                    void card.offsetWidth;
                    card.classList.add('fade-in');
                }
            });
        });
    });

    /* ============ Lightbox ============ */
    var lightbox = document.getElementById('lightbox');
    var lightboxClose = document.getElementById('lightboxClose');
    var lightboxMedia = document.getElementById('lightboxMedia');
    var lightboxImg = document.getElementById('lightboxImg');
    var lightboxPlaceholder = document.getElementById('lightboxPlaceholder');
    var lightboxCat = document.getElementById('lightboxCat');
    var lightboxTitle = document.getElementById('lightboxTitle');
    var lightboxDesc = document.getElementById('lightboxDesc');

    function openLightbox(data) {
        if (!lightbox) return;
        if (data.image) {
            lightboxImg.src = data.image;
            lightboxImg.alt = data.title || '';
            lightboxImg.classList.remove('hidden');
            lightboxPlaceholder.classList.add('hidden');
        } else {
            lightboxImg.src = '';
            lightboxImg.classList.add('hidden');
            lightboxPlaceholder.textContent = data.cat || '';
            lightboxPlaceholder.classList.remove('hidden');
        }
        lightboxCat.textContent = data.cat || '';
        lightboxTitle.textContent = data.title || '';
        lightboxDesc.textContent = data.desc || '';
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        if (!lightbox) return;
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.project-open').forEach(function (btn) {
        btn.addEventListener('click', function () {
            openLightbox({
                title: btn.getAttribute('data-title'),
                desc: btn.getAttribute('data-desc'),
                cat: btn.getAttribute('data-cat'),
                image: btn.getAttribute('data-image')
            });
        });
    });

    if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
    if (lightbox) {
        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox) closeLightbox();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeLightbox();
        });
    }

    /* ============ Review Lightbox ============ */
    var reviewLightbox = document.getElementById('reviewLightbox');
    var reviewLightboxClose = document.getElementById('reviewLightboxClose');
    var reviewLightboxFull = document.getElementById('reviewLightboxFull');
    var reviewLightboxName = document.getElementById('reviewLightboxName');
    var reviewLightboxRole = document.getElementById('reviewLightboxRole');
    var reviewLightboxInitial = document.getElementById('reviewLightboxInitial');

    function openReviewLightbox(data) {
        if (!reviewLightbox) return;
        reviewLightboxFull.textContent = data.full || data.quote || '';
        reviewLightboxName.textContent = data.name || '';
        reviewLightboxRole.textContent = data.role || '';
        if (reviewLightboxInitial) {
            reviewLightboxInitial.textContent = (data.name || '?').trim().charAt(0).toUpperCase();
        }
        reviewLightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeReviewLightbox() {
        if (!reviewLightbox) return;
        reviewLightbox.classList.remove('open');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.review-open').forEach(function (btn) {
        btn.addEventListener('click', function () {
            openReviewLightbox({
                quote: btn.getAttribute('data-quote'),
                full: btn.getAttribute('data-full'),
                name: btn.getAttribute('data-name'),
                role: btn.getAttribute('data-role')
            });
        });
    });

    if (reviewLightboxClose) reviewLightboxClose.addEventListener('click', closeReviewLightbox);
    if (reviewLightbox) {
        reviewLightbox.addEventListener('click', function (e) {
            if (e.target === reviewLightbox) closeReviewLightbox();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeReviewLightbox();
        });
    }

    /* ============ Contact Form (placeholder → Supabase di Fase 4) ============ */
    var contactForm = document.getElementById('contactForm');
    var formStatus = document.getElementById('formStatus');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            if (formStatus) {
                formStatus.classList.remove('hidden');
                formStatus.classList.add('text-primary');
                formStatus.textContent = 'Terima kasih! Form belum terhubung ke server — integrasi Supabase menyusul (Fase 4).';
            }
        });
    }
});
