-- ============================================================
-- 0003_clean_testimonials.sql
-- Bersihkan data testimonials yang bermasalah (status kosong)
-- Jalankan di Supabase Dashboard > SQL Editor
-- ============================================================

-- Hapus semua data lama yang bermasalah
DELETE FROM public.testimonials;

-- Insert sample data yang benar (status valid)
INSERT INTO public.testimonials (name, role, rating, quote, review, status)
VALUES
    ('(Example) Rizky Ramadhan', 'Founder, Minuman Kemasan', 5,
     'Kerja sama yang rapi dan hasil desainnya jauh di atas ekspektasi. Komunikasi cepat dan selalu on time.',
     'Kerja sama dengan SEMUT Studio benar-benar rapi dari awal sampai akhir. Brief dipahami dengan baik, revisi ditangani cepat, dan hasil desainnya jauh di atas ekspektasi kami. Komunikasi selalu cepat dan proyek dikerjakan on time, jadi tim kami bisa langsung memakai asetnya untuk kebutuhan packaging dan promosi tanpa hambatan.',
     'approved'),
    ('(Example) Dewi Lestari', 'Marketing Manager, F&B Brand', 5,
     'Visual 3D produknya bikin katalog kami keliatan premium. Klien kami juga banyak yang melirik hasil render-nya.',
     'Hasil render 3D produknya benar-benar bikin katalog kami keliatan premium. Material, pencahayaan, sampai detail kecil diperhatikan, jadi produk terlihat hidup dan menggugah selera. Banyak klien kami yang akhirnya melirik produk lewat visual yang ditampilkan. Kami puas dan pasti akan kerja sama lagi untuk kampanye berikutnya.',
     'approved'),
    ('(Example) Andika Pratama', 'Owner, Online Store', 4,
     'Dari logo sampai social media kit, semuanya konsisten dan siap dipakai. Recommended untuk brand yang baru mulai.',
     'Dari logo sampai social media kit, semuanya dikerjakan dengan konsisten dan hasilnya siap pakai langsung. SEMUT Studio memahami bahwa brand baru butuh identitas yang jelas, jadi setiap elemen dibuat dengan arahan yang terstruktur. Sangat direkomendasikan untuk bisnis yang baru mulai membangun brand.',
     'approved');
