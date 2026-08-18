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
    var revealObserver = null;
    if ('IntersectionObserver' in window) {
        revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });
    }

    function observeReveals() {
        var els = document.querySelectorAll('.reveal:not(.visible)');
        if (revealObserver) {
            els.forEach(function (el) { revealObserver.observe(el); });
        } else {
            els.forEach(function (el) { el.classList.add('visible'); });
        }
    }
    observeReveals();

    /* ============ Interaksi kartu (glow, 3D tilt, lightbox) ============ */
    function bindCardInteractions() {
        document.querySelectorAll('.project-card, .glow-click').forEach(function (card) {
            if (card.dataset.pressBound) return;
            card.dataset.pressBound = '1';
            card.addEventListener('mousedown', function () { card.classList.add('is-pressed'); });
            card.addEventListener('mouseup', function () { card.classList.remove('is-pressed'); });
            card.addEventListener('mouseleave', function () { card.classList.remove('is-pressed'); });
        });

        document.querySelectorAll('.tilt-card').forEach(function (card) {
            if (card.dataset.tiltBound) return;
            card.dataset.tiltBound = '1';
            var subtle = card.classList.contains('tilt-subtle');
            card.addEventListener('mousemove', function (e) {
                var rect = card.getBoundingClientRect();
                var px = (e.clientX - rect.left) / rect.width;
                var py = (e.clientY - rect.top) / rect.height;
                var strength = subtle ? 8 : 12;
                var rotateY = (px - 0.5) * strength;
                var rotateX = (0.5 - py) * strength;
                var lift = subtle ? '-5px' : '-6px';
                var scale = subtle ? '1.02' : '1.02';
                card.classList.add('is-moving');
                card.style.transform = 'perspective(700px) rotateX(' + rotateX.toFixed(2) + 'deg) rotateY(' + rotateY.toFixed(2) + 'deg) translateY(' + lift + ') scale(' + scale + ')';
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

        document.querySelectorAll('.project-open').forEach(function (btn) {
            if (btn.dataset.openBound) return;
            btn.dataset.openBound = '1';
            btn.addEventListener('click', function () {
                openLightbox({
                    title: btn.getAttribute('data-title'),
                    desc: btn.getAttribute('data-desc'),
                    cat: btn.getAttribute('data-cat'),
                    image: btn.getAttribute('data-image')
                });
            });
        });

        document.querySelectorAll('.review-open').forEach(function (btn) {
            if (btn.dataset.reviewBound) return;
            btn.dataset.reviewBound = '1';
            btn.addEventListener('click', function () {
                openReviewLightbox({
                    quote: btn.getAttribute('data-quote'),
                    full: btn.getAttribute('data-full'),
                    name: btn.getAttribute('data-name'),
                    role: btn.getAttribute('data-role')
                });
            });
        });
    }

    /* ============ Portfolio Filter ============ */
    var filterBtns = document.querySelectorAll('.filter-btn');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterBtns.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');

            var filter = btn.getAttribute('data-filter');
            document.querySelectorAll('.project-card').forEach(function (card) {
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

    if (reviewLightboxClose) reviewLightboxClose.addEventListener('click', closeReviewLightbox);
    if (reviewLightbox) {
        reviewLightbox.addEventListener('click', function (e) {
            if (e.target === reviewLightbox) closeReviewLightbox();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeReviewLightbox();
        });
    }

    /* ============ Supabase: konfigurasi ============ */
    var supa = window.SEMUT_CONFIG || {};
    var isSupabaseReady = !!(supa.supabaseUrl && supa.supabaseAnonKey);

    function supabaseRequest(path, options) {
        options = options || {};
        options.headers = Object.assign({
            apikey: supa.supabaseAnonKey,
            'Content-Type': 'application/json'
        }, options.headers || {});
        var fullUrl = supa.supabaseUrl + path;
        return fetch(fullUrl, options);
    }

    function escapeHtml(value) {
        return String(value == null ? '' : value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    /* ============ Galeri dari Supabase ============ */
    var gallery = document.getElementById('gallery');

    function renderProjects(projects) {
        if (!gallery) return;
        var html = '';
        projects.forEach(function (p) {
            var title = escapeHtml(p.title);
            var desc = escapeHtml(p.description || '');
            var cat = escapeHtml(p.category || '');
            var image = escapeHtml(p.image_url || '');
            html +=
                '<article class="project-card tilt-card group rounded-3xl" data-category="' + cat + '">' +
                '  <div class="tilt-glass pointer-events-none" aria-hidden="true"></div>' +
                '  <button type="button" class="relative z-10 w-full block text-left project-open"' +
                '          data-title="' + title + '" data-desc="' + desc + '" data-cat="' + cat + '" data-image="' + image + '">' +
                '    <div class="aspect-[4/3] overflow-hidden rounded-t-3xl">' +
                (image
                    ? '<img src="' + image + '" alt="' + title + '" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy">'
                    : '<div class="w-full h-full bg-neutral-sand flex items-center justify-center"><span class="font-display font-bold text-5xl text-primary/50">' + cat + '</span></div>') +
                '    </div>' +
                '    <div class="tilt-body p-5 flex items-center justify-between gap-3">' +
                '      <div>' +
                '        <span class="text-xs font-semibold uppercase tracking-wider text-primary">' + cat + '</span>' +
                '        <h3 class="mt-0.5 font-display font-semibold text-accent">' + title + '</h3>' +
                '      </div>' +
                '      <span class="w-9 h-9 shrink-0 rounded-full border border-neutral-line bg-neutral-panel text-neutral-soft group-hover:bg-primary group-hover:text-neutral group-hover:border-primary flex items-center justify-center transition">' +
                '        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l-5 5-5-5M17 15l-5 5-5-5"/></svg>' +
                '      </span>' +
                '    </div>' +
                '  </button>' +
                '</article>';
        });
        gallery.innerHTML = html;
        bindCardInteractions();
    }

    function loadProjects() {
        if (!isSupabaseReady || !gallery) return;
        supabaseRequest('/rest/v1/projects?select=*&order=sort_order.asc')
            .then(function (res) {
                if (!res.ok) return res.text().then(function (t) { throw new Error('HTTP ' + res.status + ': ' + t); });
                return res.json();
            })
            .then(function (rows) {
                if (Array.isArray(rows) && rows.length > 0) {
                    renderProjects(rows);
                }
            })
            .catch(function () {
                /* Gagal → pakai data contoh dari PHP */
            });
    }

    /* ============ Contact Form → Supabase ============ */
    var contactForm = document.getElementById('contactForm');
    var formStatus = document.getElementById('formStatus');

    function showFormStatus(text, isError) {
        if (!formStatus) return;
        formStatus.classList.remove('hidden', 'text-primary', 'text-red-400');
        formStatus.classList.add(isError ? 'text-red-400' : 'text-primary');
        formStatus.textContent = text;
    }

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var btn = contactForm.querySelector('button[type="submit"]');
            var name = document.getElementById('cfName').value.trim();
            var email = document.getElementById('cfEmail').value.trim();
            var subject = document.getElementById('cfSubject').value;
            var message = document.getElementById('cfMessage').value.trim();

            if (!isSupabaseReady) {
                showFormStatus('Terima kasih! Form belum terhubung ke Supabase — isi kredensial di src/config.php.');
                return;
            }

            if (btn) btn.disabled = true;
            showFormStatus('Mengirim...', false);

            supabaseRequest('/rest/v1/messages', {
                method: 'POST',
                body: JSON.stringify({ name: name, email: email, subject: subject, message: message })
            }).then(function (res) {
                if (btn) btn.disabled = false;
                if (res.ok) {
                    showFormStatus('Terima kasih! Pesan berhasil dikirim — kami balas dalam 1×24 jam.');
                    contactForm.reset();
                } else {
                    showFormStatus('Gagal mengirim. Coba lagi ya.', true);
                }
            }).catch(function () {
                if (btn) btn.disabled = false;
                showFormStatus('Tidak dapat menghubungi server. Periksa koneksi.', true);
            });
        });
    }

    /* ============ Toggle Review Form ============ */
    var reviewFormWrap = document.getElementById('reviewFormWrap');
    var reviewFormToggle = document.getElementById('reviewFormToggle');

    if (reviewFormToggle && reviewFormWrap) {
        reviewFormToggle.addEventListener('click', function () {
            var isHidden = reviewFormWrap.classList.toggle('hidden');
            reviewFormToggle.setAttribute('aria-expanded', String(!isHidden));
            reviewFormToggle.innerHTML = isHidden
                ? '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg> Tulis Review'
                : '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg> Tutup';
            if (!isHidden) {
                reviewFormWrap.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    }

    /* ============ Review Form → Supabase (pending) ============ */
    var reviewForm = document.getElementById('reviewForm');
    var reviewStatus = document.getElementById('reviewStatus');

    function showReviewStatus(text, isError) {
        if (!reviewStatus) return;
        reviewStatus.classList.remove('hidden', 'text-primary', 'text-red-400');
        reviewStatus.classList.add(isError ? 'text-red-400' : 'text-primary');
        reviewStatus.textContent = text;
    }

    if (reviewForm) {
        reviewForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var btn = reviewForm.querySelector('button[type="submit"]');
            var name = document.getElementById('rfName').value.trim();
            var role = document.getElementById('rfRole').value.trim();
            var rating = parseInt(document.getElementById('rfRating').value, 10) || 5;
            var quote = document.getElementById('rfReview').value.trim();

            if (!name || !quote) {
                showReviewStatus('Nama dan review wajib diisi ya.', true);
                return;
            }
            if (!isSupabaseReady) {
                showReviewStatus('Form belum terhubung ke Supabase — isi kredensial di src/config.php.', true);
                return;
            }

            if (btn) btn.disabled = true;
            showReviewStatus('Mengirim...', false);

            supabaseRequest('/rest/v1/testimonials', {
                method: 'POST',
                body: JSON.stringify({ name: name, role: role, rating: rating, quote: quote, status: 'pending' })
            }).then(function (res) {
                if (btn) btn.disabled = false;
                if (res.ok) {
                    showReviewStatus('Terima kasih! Review kamu menunggu persetujuan admin.', false);
                    reviewForm.reset();
                } else {
                    return res.text().then(function (body) {
                        console.error('Supabase testimonial error', res.status, body);
                        showReviewStatus('Gagal mengirim (HTTP ' + res.status + '). Cek console browser.', true);
                    });
                }
            }).catch(function () {
                if (btn) btn.disabled = false;
                showReviewStatus('Tidak dapat menghubungi server. Periksa koneksi.', true);
            });
        });
    }

    /* ============ Testimoni dari Supabase ============ */
    var testimonialsGrid = document.getElementById('testimonialsGrid');

    function renderTestimonials(rows) {
        if (!testimonialsGrid || !Array.isArray(rows) || !rows.length) return;
        var html = '';
        rows.forEach(function (t) {
            var quote = escapeHtml(t.quote || '');
            var full = escapeHtml(t.review || t.quote || '');
            var name = escapeHtml(t.name || '');
            var role = escapeHtml(t.role || '');
            var rating = Math.max(1, Math.min(5, parseInt(t.rating, 10) || 5));
            var stars = new Array(rating + 1).join('\u2605');
            html +=
                '<figure class="tilt-card tilt-subtle reveal group rounded-3xl">' +
                '  <div class="tilt-glass pointer-events-none" aria-hidden="true"></div>' +
                '  <button type="button" class="review-open relative z-10 w-full block text-left p-7"' +
                '          data-quote="' + quote + '" data-full="' + full + '" data-name="' + name + '" data-role="' + role + '">' +
                '    <div class="tilt-body">' +
                '      <div class="text-primary mb-4 text-lg tracking-widest" aria-hidden="true">' + stars + '</div>' +
                '      <p class="text-base text-accent/80 leading-relaxed line-clamp-4">\u201C' + quote + '\u201D</p>' +
                '      <div class="mt-6 border-t border-neutral-line pt-4">' +
                '        <p class="font-semibold text-accent text-base">' + name + '</p>' +
                '        <p class="text-xs text-neutral-soft mt-0.5">' + role + '</p>' +
                '      </div>' +
                '      <span class="mt-4 inline-flex items-center gap-1.5 text-xs font-semibold text-primary group-hover:gap-3 transition-all">Baca review lengkap' +
                '        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10"/></svg>' +
                '      </span>' +
                '    </div>' +
                '  </button>' +
                '</figure>';
        });
        testimonialsGrid.innerHTML = html;
        bindCardInteractions();
        observeReveals();
    }

    function loadTestimonials() {
        if (!isSupabaseReady || !testimonialsGrid) return;
        supabaseRequest('/rest/v1/testimonials?select=*&status=eq.approved&order=created_at.asc')
            .then(function (res) {
                if (!res.ok) return res.text().then(function (t) { throw new Error('HTTP ' + res.status + ': ' + t); });
                return res.json();
            })
            .then(function (rows) {
                if (Array.isArray(rows) && rows.length > 0) {
                    renderTestimonials(rows);
                }
            })
            .catch(function (err) {
                console.warn('[Testimonials] Gagal load dari Supabase:', err.message);
            });
    }

    /* ============ Back to top ============ */
    var backToTop = document.getElementById('backToTop');
    if (backToTop) {
        function updateBackToTop() {
            backToTop.classList.toggle('visible', window.scrollY > 500);
        }
        window.addEventListener('scroll', updateBackToTop, { passive: true });
        updateBackToTop();
        backToTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ============ Active nav link (scroll spy) ============ */
    var spySections = document.querySelectorAll('main section[id]');
    var navLinks = document.querySelectorAll('.nav-link');

    function setActiveNav(id) {
        navLinks.forEach(function (link) {
            link.classList.toggle('active', link.getAttribute('href') === '#' + id);
        });
    }

    if ('IntersectionObserver' in window && spySections.length) {
        var spyObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) setActiveNav(entry.target.id);
            });
        }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });
        spySections.forEach(function (s) { spyObserver.observe(s); });
        setActiveNav('home');
    } else {
        var spyTimer = null;
        window.addEventListener('scroll', function () {
            if (spyTimer) return;
            spyTimer = setTimeout(function () {
                spyTimer = null;
                var pos = window.scrollY + 120;
                var current = 'home';
                spySections.forEach(function (s) {
                    if (s.offsetTop <= pos) current = s.id;
                });
                setActiveNav(current);
            }, 80);
        }, { passive: true });
        setActiveNav('home');
    }

    /* ============ Init ============ */
    bindCardInteractions();
    loadProjects();
    loadTestimonials();
});
