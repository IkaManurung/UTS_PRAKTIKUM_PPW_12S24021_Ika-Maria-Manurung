# DEL Lab Equipment & Asset Tracking System - DEL-LEATS


## Fitur dasar
- Daftar data dari database melalui Eloquent.
- Form tambah data dan validasi server-side.
- Pencarian berdasarkan `judul` melalui query string.
- Halaman detail dan hapus data.
- Tampilan responsif sederhana.

## Menjalankan di Windows / VS Code
1. Pastikan PHP 8.1+ dan Composer tersedia.
2. Buka folder proyek ini di VS Code → Terminal → New Terminal.
3. Jalankan:
   ```bash
   composer install
   copy .env.example .env
   php artisan key:generate
   ```
4. Buat database MySQL bernama `ppw_uts` (atau sesuaikan `.env`).
5. Jalankan `php artisan migrate`.
6. Jalankan `php artisan serve`, lalu buka URL yang tampil di terminal.

## GitHub
Untuk repository yang sudah terhubung:
```bash
git init
git status
git add .
git commit -m "feat: membuat website DEL-LEATS"
git branch -M main
git remote add origin https://github.com/IkaManurung/UTS_PRAKTIKUM_PPW_12S24021_Ika-Maria-Manurung
git push -u origin main
```

Jangan upload `.env`. ZIP ini tidak menyertakan `vendor`; jalankan `composer install` saat pertama kali.
Sesuaikan fitur, field, validasi, dan tampilan dengan soal dan modul praktikum.
