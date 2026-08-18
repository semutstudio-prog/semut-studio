-- ============================================================
-- 0002_testimonials.sql
-- Tabel testimoni: klien submit (pending) → admin approve
-- Jalankan di Supabase Dashboard > SQL Editor
-- ============================================================

create table if not exists public.testimonials (
    id          uuid primary key default gen_random_uuid(),
    name        text not null,
    role        text,
    rating      smallint not null default 5 check (rating between 1 and 5),
    quote       text not null,
    review      text,
    status      text not null default 'pending' check (status in ('pending', 'approved', 'rejected')),
    created_at  timestamptz not null default now(),
    approved_at timestamptz
);

alter table public.testimonials enable row level security;

-- Publik boleh submit review (selalu mulai sebagai pending)
create policy "testimonials_insert_public"
    on public.testimonials for insert
    with check (status = 'pending');

-- Publik hanya bisa baca review yang sudah disetujui
create policy "testimonials_select_approved_public"
    on public.testimonials for select
    using (status = 'approved');

-- Admin (login) boleh kelola semua review
create policy "testimonials_all_admin"
    on public.testimonials for all
    using (auth.role() = 'authenticated')
    with check (auth.role() = 'authenticated');
