# CATATAN OPERASIONAL — SEMUT Studio

Catatan ringkas untuk operasional & maintenance website. Update dokumen ini setiap ada perubahan alur/setup.

---

## 1. Jalanin Server Lokal

Tanpa XAMPP. Dari folder project:
```
php -S localhost:8000
```
Buka `http://localhost:8000`. Stop: `Ctrl + C`.

## 2. Isi Konfigurasi Wajib

File: `src/config.php`

| Kunci | Fungsi | Catatan |
|-------|--------|---------|
| `social.email` | Alamat email ditampilkan di halaman kontak (link `mailto:`) | ⚠️ Masih placeholder `example@semutstudio.com` |
| `supabase.url` | URL project Supabase | Jangan diedit tanpa alasan |
| `supabase.anon_key` | Anon key (boleh publik, RLS yang melindungi) | Jangan taruh `service_role` di frontend! |

## 3. Alur "Pesan" (Form Kontak)

```
Form kanan  →  POST ke Supabase → tabel messages  →  Webhook INSERT
                                                          ↓
                                        Edge Function notify-contact → email Resend
```

- Link email di **kiri** = jalur cadangan (`mailto:`), tidak terhubung ke form.
- Setup Supabase (sekali saja):
  1. Jalankan `supabase/migrations/0001_init.sql` (tabel `projects`, `messages`, storage).
  2. Deploy Edge Function `supabase/functions/notify-contact`.
  3. Set secrets: `RESEND_API_KEY`, `NOTIFY_EMAIL` (alamat studio).
  4. Dashboard > Database > Webhooks: tabel `messages`, event INSERT → POST ke URL fungsi.
- Ganti `from` di Edge Function (`onboarding@resend.dev`) dengan domain terverifikasi di Resend untuk production.

## 4. Alur Testimoni (Client Submit → Admin Approve)

```
Form review → POST → tabel testimonials (status = 'pending')
                          ↓
              Admin ubah status → 'approved' → tampil di website
```

- Setup: jalankan `supabase/migrations/0002_testimonials.sql`.
- RLS: publik hanya INSERT `pending` + SELECT `approved`; admin boleh kelola semua.
- **Approve/reject**: di Supabase Dashboard ubah kolom `status` (pending / approved / rejected) — tidak ada halaman admin.
- Kalau belum disetujui, review TIDAK tampil. Data contoh dari PHP (`index.php`) tetap tampil sebagai fallback kalau Supabase kosong/gagal.

## 5. Tambah / Ubah Konten

| Konten | Cara |
|--------|------|
| **Proyek portofolio** | Insert ke tabel `projects` di Supabase (tampil otomatis via `loadProjects()`). Gambar di storage bucket `works`. |
| **Testimoni** | Insert `pending` via form, lalu approve. |
| **Layanan / Marquee / Testimoni contoh** | Edit array PHP di `public/index.php` (fallback statis). |

## 6. Struktur Warna

Definisi: `src/partials/header.php` (blok `tailwind.config`) + `public/assets/css/style.css` (variabel `:root`).

| Token | Hex | Pemakaian |
|-------|-----|-----------|
| `primary` | `#FF6B5E` | CTA, link, filter aktif |
| `secondary` | `#FF8A7A` | Hover tombol |
| `accent` | `#F5F5F7` | Judul/heading |
| `neutral.*` | lihat STRUKTUR.md | Background/border/teks |

## 7. File Penting

| File | Fungsi |
|------|--------|
| `public/index.php` | Halaman utama (semua section + fallback data) |
| `src/partials/header.php` | Navbar + head (SEO, Tailwind config, tema) |
| `src/partials/footer.php` | Footer + tombol back-to-top |
| `public/assets/js/script.js` | Semua interaksi frontend (tema, menu, scroll-spy, galeri, form, testimonials) |
| `public/assets/css/style.css` | Custom CSS + variabel tema |
| `src/config.php` | Konfigurasi (email, Supabase) |
| `supabase/migrations/` | Riwayat SQL (buat file baru, jangan edit yang lama) |
| `supabase/functions/` | Edge Functions |

## 8. Aturan Penting

1. **Jangan simpan kredensial** di `public/` — hanya di `src/config.php` (dan env production).
2. **Perubahan database** → buat file SQL baru di `supabase/migrations/`.
3. Kalau form gagal kirim, cek dulu: kredensial config, tabel/RLS sudah jalan, dan console browser.
