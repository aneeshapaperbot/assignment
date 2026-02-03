# assignment

# Travel API - Laravel JWT Project

This is a **Travel API** built with Laravel 11 using **JWT-based authentication**.  
It provides endpoints for **countries, destinations, tours, hotels, and attractions**.

---

## Features

- JWT-based **Register / Login / Logout**
- Users table: `first_name`, `last_name`, `email`, `phone`, `password`, `role`
- Core Models & Relationships:
  - **Countries** → has many Destinations
  - **Destinations** → has many Tours, Hotels, Attractions
  - **Tours** → belongs to Destination
  - **Hotels** → belongs to Destination
  - **Attractions** → belongs to Destination
- API Endpoints (GET):
  - `/api/countries`
  - `/api/destinations` (filter by country)
  - `/api/tours` (filter by destination)
  - `/api/hotels`
  - `/api/attractions`
- Seeder with **sample data**

---

## Requirements

- PHP >= 8.2
- Composer
- MySQL / MariaDB
- Laravel 11
- Postman (for API testing)

---

## Installation Steps

1. **Clone the repository**
git clone <your-github-repo-link>
cd travel-api

2. **Install dependencies**

composer install

3. **Create .env file**
copy .env.example .env

4.**Update .env database credentials**
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travel_api
DB_USERNAME=root
DB_PASSWORD=your_mysql_password

5. **Generate Laravel app key**
php artisan key:generate

6. **Install JWT package**
composer require tymon/jwt-auth
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret

7. **Run migrations**
php artisan migrate

8. **Seed the database (sample data)**
php artisan db:seed

9. **Start the Laravel server**
php artisan serve
