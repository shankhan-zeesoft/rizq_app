🚀 Setup Instructions
Prerequisites
Ensure you have the following installed on your system:
- PHP 8+
- Composer
- MySQL
- Laravel 11+

Installation
Clone the repository:
```sh
git clone https://github.com/your-repo-name.git
cd your-repo-name
```
Install dependencies:
```sh
composer install
```
Copy the environment file and configure it:
```sh
cp .env.example .env
```
Generate an application key:
```sh
php artisan key:generate
```
Set up the database in the `.env` file and run migrations:
```sh
php artisan migrate --seed
```


Assumptions Made

The application uses Laravel Sanctum for API authentication.

The product model supports multiple categories via a pivot table.

Filters are applied via query parameters.

Default database is MySQL.


Time Spent on the Task

Database Migrations & Models: ~1 hour

API Development & Authentication: ~2 hours

Filtering & Relationships: ~1.5 hours

Testing & Debugging: ~1 hour

Documentation & Cleanup: ~0.5 hour

Total: ~6 hours



Admin Panel and APIs LOGIN Credentials

Email: admin@rizq.com
Password: password

1. You can see the product list on the admin panel
2. and also CRUD operation for Categories.


API Documentation link.
https://documenter.getpostman.com/view/16516825/2sAYXEDHdX