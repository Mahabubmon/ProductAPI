# Product API

## Setup

1. Clone the repository
2. Run `composer install`
3. Set up your `.env` file
4. Run `php artisan migrate`
5. Run `php artisan passport:install`
6. Run `php artisan serve`

## Authentication

Use Laravel Passport for authentication. Obtain a token by registering a user and logging in.

## Endpoints

- `GET /api/product/{id}`: Get detailed information about a product (requires authentication)
