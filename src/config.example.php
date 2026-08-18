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
        'instagram' => 'https://www.instagram.com/semutstudio25',
        'facebook'  => 'https://www.facebook.com/MukhlisSemut',
        'fiverr'    => 'https://www.fiverr.com/s/Q2Y2Kv1',
        'discord'   => 'https://discord.com/users/semutstudio',
        'email'     => 'semutstudio25@gmail.com',
    ],
    'supabase' => [
        // Ambil dari Supabase Dashboard > Project Settings > API
        'url'  => 'https://<project-ref>.supabase.co',
        'anon_key' => 'eyJhbGciOi...', // anon/public key (boleh publik, data dilindungi RLS)
    ],
];
