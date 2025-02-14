🚀 Setup Instructions
Prerequisites
Ensure you have the following installed on your system:
- PHP 8+
- Composer
- MySQL
- Laravel 11+
- Node.js (if needed for frontend integration)
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

Admin Panel and APIs LOGIN Credentials

Email: admin@rizq.com
Password: password

1. You can see the product list on the admin panel
2. and also CRUD operation for Categories.


API Documentation link.
https://documenter.getpostman.com/view/16516825/2sAYXEDHdX