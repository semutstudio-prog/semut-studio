# ROADMAP — Website Portofolio Marketing Desain 2D & 3D

## Stack
- **Frontend:** HTML + TailwindCSS + JavaScript
- **Backend:** Native PHP
- **Database & Auth:** Supabase
- **Version Control:** GitHub
- **Hosting:** TBD di Fase 5

> ⚠️ **Catatan:** Vercel tidak mendukung PHP. Kalau PHP wajib jalan di production, gunakan hosting PHP (Hostinger/Niagahoster). Kalau Vercel, frontend jadi statis dan Supabase jadi backend penuh.

---

## Fase 0 — Persiapan
- [ ] Tentukan target audiens (klien produk, brand, studio, dll.)
- [ ] Kumpulkan aset portofolio: karya 2D (poster, banner, branding) & 3D (render, mockup)
- [ ] Tentukan gaya desain website (warna, font, mood)
- [ ] Buat copywriting: hero tagline, about, service, CTA
- [ ] Setup akun: GitHub, Vercel, Supabase

## Fase 1 — Setup Project
- [ ] Init repo GitHub (misal `portfolio-site`) + clone ke lokal
- [ ] Struktur folder:
  - `public/` → assets (css, js, images)
  - `src/` → template PHP / partials
  - `supabase/` → SQL migrations
- [ ] Install TailwindCSS (CDN atau build pipeline npm)
- [ ] File dasar: `index.php`, `header.php`, `footer.php`, `style.css`, `script.js`
- [ ] Jalanin server lokal: `php -S localhost:8000`
- [ ] Hubungkan repo GitHub → Vercel (auto-deploy)

## Fase 2 — Build Frontend (PHP + Tailwind)
- [ ] **Struktur halaman:**
  - Hero (nama + tagline + CTA)
  - Galeri portofolio (filter kategori: 2D / 3D)
  - Tentang saya
  - Layanan & harga
  - Testimoni (opsional)
  - Kontak (form + sosial media)
  - Footer
- [ ] Implementasi Tailwind (mobile-first, responsif)
- [ ] Detail karya (lightbox / modal saat klik galeri)
- [ ] Animasi halus (scroll reveal, hover effect)
- [ ] SEO dasar: meta tags, Open Graph, favicon
- [ ] Gunakan PHP sebagai template: partial header/footer, loop data

## Fase 3 — Backend dengan Supabase
- [ ] Buat project Supabase
- [ ] Tabel `projects` (judul, kategori 2d/3d, deskripsi, image_url, stack, link)
- [ ] Tabel `messages` (form kontak)
- [ ] Storage untuk upload gambar karya
- [ ] Auth (opsional): login admin untuk kelola portofolio
- [ ] Form kontak → simpan ke `messages` + notifikasi email (Edge Function)
- [ ] SQL migrations di folder `supabase/`

## Fase 4 — Integrasi Frontend & Backend
- [ ] Ambil data portofolio dari Supabase → render galeri dinamis
- [ ] Filter kategori 2D/3D terhubung ke data asli
- [ ] Form kontak terhubung ke Supabase
- [ ] (Opsional) Halaman admin sederhana untuk tambah/edit karya
- [ ] Loading state & error handling

## Fase 5 — Deploy & Testing
- [ ] Pilih hosting: Vercel (frontend statis) atau hosting PHP (Hostinger/Niagahoster)
- [ ] Setup `vercel.json` (kalau pakai Vercel)
- [ ] Simpan secrets (Supabase URL & anon key)
- [ ] Deploy ke hosting pilihan
- [ ] Cek SSL, responsif, kecepatan (PageSpeed)
- [ ] Test form kontak end-to-end
- [ ] Submit sitemap ke Google Search Console

## Fase 6 — Rilis & Maintenance
- [ ] Hubungkan custom domain (jika ada)
- [ ] Backup Supabase (scheduled)
- [ ] Update portofolio berkala
- [ ] Monitoring: uptime, analytics
- [ ] Iterasi berdasarkan feedback klien

---

## Catatan: Jalanin Server Lokal
Tanpa XAMPP/Laragon. Cukup install PHP, lalu dari folder project:
```
php -S localhost:8000
```
Buka `http://localhost:8000` di browser. Stop server dengan `Ctrl + C`.

## Tools
| Kebutuhan | Tool |
|-----------|------|
| Frontend | HTML + TailwindCSS + JS |
| Backend | Native PHP |
| Database/Auth/Storage | Supabase |
| Version control | GitHub |
| Deploy | Vercel / hosting PHP |
| Server lokal | PHP built-in server (`php -S`) |
