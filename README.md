# siakad-pesantren

Sistem informasi akademik pesantren berbasis Laravel.

## Kebutuhan Server

- PHP 8.2 atau lebih baru
- Composer
- MySQL/MariaDB
- Node.js dan npm untuk build asset
- Web server yang diarahkan ke folder `public`

## Setup Produksi

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Atur `.env` produksi:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=user_database
DB_PASSWORD=password_database
```
