-- ============================================================
-- 0001_init.sql
-- Inisialisasi database SEMUT Studio
-- Jalankan di Supabase Dashboard > SQL Editor
-- ============================================================

-- ---------- Fungsi updated_at otomatis ----------
create or replace function public.set_updated_at()
returns trigger as $$
begin
    new.updated_at = now();
    return new;
end;
$$ language plpgsql;

-- ============================================================
-- Tabel: projects (portofolio)
-- ============================================================
create table if not exists public.projects (
    id          uuid primary key default gen_random_uuid(),
    title       text not null,
    category    text not null check (category in ('2D', '3D')),
    description text,
    image_url   text,
    stack       text,
    link        text,
    sort_order  integer not null default 0,
    created_at  timestamptz not null default now(),
    updated_at  timestamptz not null default now()
);

alter table public.projects enable row level security;

-- Publik boleh baca portofolio
create policy "projects_select_public"
    on public.projects for select using (true);

-- Admin (login) boleh kelola portofolio
create policy "projects_all_admin"
    on public.projects for all
    using (auth.role() = 'authenticated')
    with check (auth.role() = 'authenticated');

-- ============================================================
-- Tabel: messages (form kontak)
-- ============================================================
create table if not exists public.messages (
    id         uuid primary key default gen_random_uuid(),
    name       text not null,
    email      text not null,
    subject    text,
    message    text not null,
    status     text not null default 'new' check (status in ('new', 'read', 'done')),
    created_at timestamptz not null default now()
);

alter table public.messages enable row level security;

-- Siapa saja boleh mengirim pesan (form publik)
create policy "messages_insert_public"
    on public.messages for insert
    with check (true);

-- Hanya admin yang bisa membaca pesan
create policy "messages_select_admin"
    on public.messages for select
    using (auth.role() = 'authenticated');

-- ============================================================
-- Storage bucket: works (gambar karya)
-- ============================================================
insert into storage.buckets (id, name, public)
values ('works', 'works', true)
on conflict (id) do nothing;

-- Publik boleh lihat gambar
create policy "works_public_read"
    on storage.objects for select
    using (bucket_id = 'works');

-- Admin boleh upload/hapus gambar
create policy "works_admin_write"
    on storage.objects for all
    using (bucket_id = 'works' and auth.role() = 'authenticated')
    with check (bucket_id = 'works' and auth.role() = 'authenticated');
