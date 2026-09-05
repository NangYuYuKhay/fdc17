# FDC17 — Laravel Admin Practice App

A Laravel 12 project combining a set of Laravel-concept tutorial routes (routing, CSRF, sessions, Blade components/localization, middleware) with a working admin-panel mini e-commerce app for managing brands, categories, items, and orders.

## Project Summary

Everything lives under the `/admin` prefix and is protected by a custom session-based login (`AuthController` + `MyAuthMiddleware`).

**Tutorial / practice routes** (`routes/web.php`):
- Routing basics — view-only, passing data to views, route parameters, dynamic routes, named routes, middleware (`/admin/routing/*`)
- CSRF handling (`/admin/csrf/*`)
- Sessions, including a simple task manager (`/admin/session/*`)
- Blade components and localization (`/admin/blade-template/*`)
- Generic starter pages (`/admin/page1`–`/admin/page5`, `/admin/app`)

**Admin app (CRUD)**:
- **Brands** and **Categories** — simple lookup tables
- **Items** — belongs to a brand and a category, has an image upload, unique item code and price
- **Orders** — create/edit an order by searching and adding items; line items are stored in `order_items` with price, qty, and sub-total, wrapped in a DB transaction on update
- **Users** — CRUD plus a password-reset flow

A small JSON API exists at `GET /api/get-items` (`FeatureBController`); Sanctum is installed for token auth but not yet used elsewhere.

**Stack**: PHP 8.2, Laravel 12, MySQL, Blade + Vite + Tailwind CSS 4, Sanctum, Pest/PHPUnit for tests.

## Setup

### Prerequisites
- PHP 8.2+
- Composer
- MySQL (or another Laravel-supported DB)
- Node.js + npm

### Steps

1. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Edit `.env` and set your database credentials. By default the app expects a MySQL database named `laravel_fdc17`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_fdc17
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   Create that database in MySQL before migrating.

3. **Run migrations and seed data**
   ```bash
   php artisan migrate --seed
   ```
   This creates the schema and seeds:
   - Two users (login credentials below)
   - A starter set of categories (Make up, Hair care, Body care, Medicine)

4. **Link the public storage disk** (needed for item image uploads)
   ```bash
   php artisan storage:link
   ```

5. **Build frontend assets**
   ```bash
   npm run build
   ```

6. **Run the app**

   For local development (serves app, queue listener, logs, and Vite together):
   ```bash
   composer run dev
   ```
   Or just the app server:
   ```bash
   php artisan serve
   ```

7. **Log in**

   Visit `http://localhost:8000/admin` and log in with a seeded account:
   | Email | Password |
   |---|---|
   | admin@gmail.com | 123456 |
   | user@gmail.com | 123456 |

### Running tests
```bash
composer test
```
