# Struktur Folder — Website Portofolio Desain 2D & 3D

Dokumen ini menjelaskan struktur folder proyek agar mudah di-maintenance.
Update dokumen ini setiap kali ada perubahan struktur.

---

## Struktur Lengkap

```
Project 1/
├── ROADMAP.md                 # Rencana pengembangan proyek
├── STRUKTUR.md                # Dokumen ini (struktur folder)
├── public/                    # Root website (document root)
│   ├── index.php              # Halaman utama
│   ├── style.css              # Custom CSS tambahan
│   ├── script.js              # JavaScript utama
│   └── assets/
│       ├── css/               # File CSS / Tailwind
│       ├── js/                # File JavaScript tambahan
│       └── images/
│           ├── og/            # Gambar Open Graph (share social)
│           └── works/         # Karya portofolio (2D & 3D)
├── src/                       # Kode PHP (tidak diakses langsung browser)
│   ├── config.php             # Konfigurasi (Supabase URL, key, dll.)
│   └── partials/
│       ├── header.php         # Bagian atas halaman (navbar)
│       └── footer.php         # Bagian bawah halaman (footer)
└── supabase/
    ├── migrations/            # SQL migrations (tabel, kebijakan RLS)
    └── functions/             # Supabase Edge Functions
```

---

## Sistem Warna (4 Kategori)

Definisi di `src/partials/header.php` (blok `tailwind.config`).

| Kategori | Token | Hex | Pemakaian |
|----------|-------|-----|-----------|
| **Primary** | `primary` | `#FF6B5E` | Warna utama brand (coral) — tombol CTA, link, filter aktif |
| **Secondary** | `secondary` | `#FF8A7A` | Pendukung primary — hover tombol |
| **Accent** | `accent` | `#F5F5F7` | Highlight teks terang — judul, heading |
| **Neutral** | `neutral.DEFAULT` | `#121214` | Latar utama |
| | `neutral.panel` | `#1B1B1F` | Kartu/panel |
| | `neutral.sand` | `#222227` | Latar subtil |
| | `neutral.line` | `#2A2A30` | Border |
| | `neutral.soft` | `#9A9AA3` | Teks sekunder |
| | `neutral.muted` | `#A7A7B0` | Teks footer |
| | `neutral.cream` | `#C2C2C9` | Teks footer terang |
| | `neutral.deepest` | `#0B0B0D` | Latar footer |
| | `neutral.border` | `#242428` | Border footer |

Aturan: pakai `primary` untuk aksi, `secondary` untuk hover, `accent` untuk teks menonjol, `neutral.*` untuk background/border/teks biasa.

## Penjelasan Per Folder
| Folder | Fungsi | Siapa yang isi |
|--------|--------|----------------|
| `public/` | Root website — semua file yang bisa diakses browser | Frontend dev |
| `public/assets/images/works/` | Simpan file gambar karya 2D & 3D | Content owner / admin |
| `public/assets/images/og/` | Gambar untuk preview saat link dishare (Open Graph) | Frontend dev |
| `public/assets/css/` | File CSS (Tailwind build / custom) | Frontend dev |
| `public/assets/js/` | File JavaScript | Frontend dev |
| `src/` | Logic PHP — tidak boleh diakses langsung dari browser | Backend dev |
| `src/partials/` | Bagian halaman yang dipakai ulang (header, footer) | Backend dev |
| `src/config.php` | Konfigurasi kredensial Supabase | Backend dev |
| `supabase/migrations/` | Riwayat perubahan database (SQL) | Backend dev |
| `supabase/functions/` | Edge Functions (misal: notifikasi email form kontak) | Backend dev |

---

## Aturan Maintenance

1. **File gambar baru** → taruh di `public/assets/images/works/`, gunakan nama deskriptif (misal `poster-brand-a.jpg`).
2. **File CSS/JS** → simpan di `public/assets/` agar mudah di-cache browser.
3. **Perubahan database** → buat file SQL baru di `supabase/migrations/` (jangan edit file lama).
4. **Kode di `src/`** → hanya bisa dipanggil lewat PHP `include`/`require`, bukan URL browser.
5. **Jangan taruh kredensial** di `public/` — simpan di `src/config.php` (dan env di production).
