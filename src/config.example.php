<?php
/**
 * Template konfigurasi. Salin ke src/config.php dan isi nilai asli.
 * src/config.php TIDAK di-commit ke git (lihat .gitignore).
 */
return [
    'site' => [
        'name'    => 'SEMUT Studio',
        'year'    => date('Y'),
    ],
    'social' => [
        'instagram' => '@semutstudio',
        'behance'   => '@semutstudio',
        'dribbble'  => '@semutstudio',
        'tiktok'    => '@semutstudio',
        'email'     => 'example@semutstudio.com',
    ],
    'supabase' => [
        // Ambil dari Supabase Dashboard > Project Settings > API
        'url'  => 'https://<project-ref>.supabase.co',
        'anon_key' => 'eyJhbGciOi...', // anon/public key (boleh publik, data dilindungi RLS)
    ],
];
