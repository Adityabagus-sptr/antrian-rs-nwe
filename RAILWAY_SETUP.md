# Setup PostgreSQL di Railway untuk Laravel

## Langkah 1: Buat Database PostgreSQL di Railway

1. **Login ke Railway**
   - Buka https://railway.app/
   - Login dengan GitHub account

2. **Buat Project Baru**
   - Klik "New Project"
   - Pilih "Provision PostgreSQL"
   - Railway akan otomatis membuat database PostgreSQL

3. **Dapatkan Database Credentials**
   - Klik database PostgreSQL yang baru dibuat
   - Buka tab "Variables"
   - Salin credentials berikut:
     - `PGHOST`
     - `PGPORT`
     - `PGDATABASE`
     - `PGUSER`
     - `PGPASSWORD`

## Langkah 2: Konfigurasi Laravel

### Update file `.env`

```env
# Database Configuration untuk Railway PostgreSQL
DB_CONNECTION=pgsql
DB_HOST=your-railway-host.railway.app
DB_PORT=5432
DB_DATABASE=railway
DB_USERNAME=postgres
DB_PASSWORD=your-railway-password

# Contoh lengkap dari Railway:
# DB_HOST=containers-us-west-123.railway.app
# DB_PORT=5432
# DB_DATABASE=railway
# DB_USERNAME=postgres
# DB_PASSWORD=abc123xyz456
```

### Ganti credentials dengan yang dari Railway:
- `DB_HOST` → nilai dari `PGHOST`
- `DB_PORT` → nilai dari `PGPORT` (biasanya 5432)
- `DB_DATABASE` → nilai dari `PGDATABASE`
- `DB_USERNAME` → nilai dari `PGUSER`
- `DB_PASSWORD` → nilai dari `PGPASSWORD`

## Langkah 3: Install PostgreSQL Extension untuk PHP

### Untuk XAMPP Windows:

1. **Cek apakah extension sudah ada:**
   - Buka `C:\xampp\php\php.ini`
   - Cari baris `;extension=pdo_pgsql`
   - Cari baris `;extension=pgsql`

2. **Enable extension:**
   - Hapus tanda `;` di depan kedua baris tersebut:
   ```ini
   extension=pdo_pgsql
   extension=pgsql
   ```

3. **Restart Apache:**
   - Buka XAMPP Control Panel
   - Stop Apache
   - Start Apache lagi

4. **Verifikasi:**
   ```bash
   php -m | findstr pgsql
   ```
   Harus muncul: `pdo_pgsql` dan `pgsql`

## Langkah 4: Jalankan Migrations

```bash
# Pastikan di directory project
cd c:\xampp\htdocs\tugas\antrian-rs

# Jalankan migrations
php artisan migrate

# Jika ada error, coba:
php artisan migrate:fresh
```

## Langkah 5: Seed Data Awal (Optional)

Buat seeder untuk loket:

```bash
php artisan make:seeder LoketSeeder
```

Edit `database/seeders/LoketSeeder.php`:

```php
<?php

namespace Database\Seeders;

use App\Models\Loket;
use Illuminate\Database\Seeder;

class LoketSeeder extends Seeder
{
    public function run(): void
    {
        $lokets = [
            [
                'nama_loket' => 'Pendaftaran Umum',
                'deskripsi' => 'Loket untuk pendaftaran pasien umum',
                'kode' => 'A',
            ],
            [
                'nama_loket' => 'Poli Gigi',
                'deskripsi' => 'Loket untuk poli gigi',
                'kode' => 'B',
            ],
            [
                'nama_loket' => 'Poli Mata',
                'deskripsi' => 'Loket untuk poli mata',
                'kode' => 'C',
            ],
            [
                'nama_loket' => 'Farmasi',
                'deskripsi' => 'Loket untuk pengambilan obat',
                'kode' => 'D',
            ],
        ];

        foreach ($lokets as $loket) {
            Loket::create($loket);
        }
    }
}
```

Jalankan seeder:

```bash
php artisan db:seed --class=LoketSeeder
```

## Langkah 6: Test Koneksi

```bash
# Test koneksi database
php artisan tinker

# Di tinker, jalankan:
>>> \DB::connection()->getPdo();
>>> \App\Models\Loket::all();
>>> exit
```

## Troubleshooting

### Error: "could not find driver"
**Solusi:** Extension PostgreSQL belum diaktifkan di PHP
- Cek `php.ini` dan pastikan `extension=pdo_pgsql` dan `extension=pgsql` sudah uncomment
- Restart Apache

### Error: "SQLSTATE[08006] Connection refused"
**Solusi:** Credentials salah atau Railway database tidak bisa diakses
- Cek kembali credentials di `.env`
- Pastikan Railway database sudah running
- Cek firewall/antivirus yang mungkin block koneksi

### Error: "SQLSTATE[42P01] relation does not exist"
**Solusi:** Migrations belum dijalankan
- Jalankan `php artisan migrate`

### Error: "SQLSTATE[23505] duplicate key value"
**Solusi:** Data sudah ada di database
- Gunakan `php artisan migrate:fresh` untuk reset database
- Atau hapus data yang duplikat

## Railway Database Management

### Akses Database via Railway CLI:

```bash
# Install Railway CLI
npm install -g @railway/cli

# Login
railway login

# Link project
railway link

# Connect ke database
railway run psql
```

### Akses via GUI (TablePlus/DBeaver):

1. Download TablePlus atau DBeaver
2. Buat koneksi baru dengan credentials dari Railway
3. Test koneksi

## Environment Variables untuk Production

Jika deploy ke Railway, tambahkan environment variables di Railway dashboard:

```
APP_NAME="Sistem Antrian RS"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.railway.app

DB_CONNECTION=pgsql
DB_HOST=${{PGHOST}}
DB_PORT=${{PGPORT}}
DB_DATABASE=${{PGDATABASE}}
DB_USERNAME=${{PGUSER}}
DB_PASSWORD=${{PGPASSWORD}}
```

Railway akan otomatis inject variables dari PostgreSQL service.

## Backup Database

```bash
# Backup via Railway CLI
railway run pg_dump > backup.sql

# Restore
railway run psql < backup.sql
```

## Monitoring

- Buka Railway dashboard
- Klik PostgreSQL service
- Tab "Metrics" untuk melihat usage
- Tab "Logs" untuk melihat query logs

---

## Checklist Setup

- [ ] Buat PostgreSQL database di Railway
- [ ] Salin credentials ke `.env`
- [ ] Enable PostgreSQL extension di PHP
- [ ] Restart Apache
- [ ] Test koneksi dengan `php artisan tinker`
- [ ] Jalankan migrations `php artisan migrate`
- [ ] Seed data awal (optional)
- [ ] Test API endpoints

Setelah semua checklist selesai, sistem sudah siap digunakan!
