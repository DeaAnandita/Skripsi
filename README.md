
# Sistem Aset Desa - Project Skeleton (Laravel-ready)

This archive is a **project skeleton** for the "Sistem Informasi Manajemen Aset Keluarga serta Lahan dan Tanah".
It contains migrations, models, controllers, routes, blade views and seeders — organized so you can paste them into a fresh Laravel project.

## How to use
1. Create a new Laravel project (on your machine):
   ```bash
   composer create-project laravel/laravel sistem-aset
   cd sistem-aset
   ```
2. Copy the folders/files from this skeleton into your Laravel project's `app/`, `database/`, `routes/`, and `resources/views/` directories accordingly.
3. Run migrations & seeders:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```
4. (Optional) Install auth scaffolding like Breeze or Jetstream for login/register:
   ```bash
   composer require laravel/breeze --dev
   php artisan breeze:install
   npm install && npm run dev
   ```
5. Start the dev server:
   ```bash
   php artisan serve
   ```

## What included
- Migrations: users, aset_keluargas, aset_lahans, rekomendasis, pengajuans, logs, attachments, roles
- Models: User, AsetKeluarga, AsetLahan, Rekomendasi, Pengajuan, Log, Attachment, Role
- Controllers: Resource controllers for CRUD
- Routes: routes/web.php (resource routes + auth middleware placeholder)
- Views: Blade files (full HTML without @extends layouts) for Users, Aset Keluarga, Aset Lahan, Reports
- Seeders: example seeders for initial data

---
This skeleton is intended to save time. After copying, you may need to adjust namespaces or tweak minor details to match your Laravel version.
