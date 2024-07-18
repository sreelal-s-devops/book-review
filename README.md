# Book Review Project

The Book Review Portal, built with Laravel, is a feature-rich web application tailored for book enthusiasts to explore and review a curated library of books. Administrators have exclusive access to manage books using CRUD operations, leveraging local query scopes for efficient data retrieval and Eloquent ORM relationships for seamless data management. Users can submit detailed reviews with ratings and comments, which are aggregated and visualized using star ratings for clarity. The portal features a robust search functionality, enabling users to filter books based name, enhancing discoverability and user interaction within a cohesive and user-friendly interface.

## Installation

1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Copy `.env.example` to `.env` and configure your environment variables.
4. Run `php artisan key:generate` to generate an application key.
5. Run `php artisan migrate -- seed` to run database migrations and dummy data insertion.
6. Serve the application using `php artisan serve`.
7. run 'npm install' and 'npm run dev'

## Usage

After installation, you can access the application via `http://localhost:8000`.
use admin@gmail.com  password- admin@1234 to login as admin

## Credits

- Author: Sreelal S
- Laravel Framework: [laravel/laravel](https://github.com/laravel/laravel)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
