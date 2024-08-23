# Group Finder

![License](https://img.shields.io/github/license/gollumeo/group-finder.fr) ![PHP](https://img.shields.io/badge/PHP-%5E8.3-blue) ![Laravel](https://img.shields.io/badge/Laravel-%5E11-orange) ![Vue.js](https://img.shields.io/badge/Vue.js-%5E3.0-brightgreen) ![PostgreSQL](https://img.shields.io/badge/PostgreSQL-%5E16.0-blue)

## Description

**Group Finder** is a web application designed for the French-speaking World of Warcraft (WoW) community in Europe. It
helps players find guilds, teams, or groups of players and also allows guilds and teams to recruit members.

This project uses a monorepo with a backend in **PHP/Laravel** exposing an API, and a frontend in **Vue.js**. It is
designed to be robust, scalable, and secure, leveraging several advanced technologies and practices to achieve these
goals.

## Features

- **Guild and Group Search**: Players can find guilds or groups that match their criteria.
- **Player Recruitment**: Guilds can post recruitment ads to attract players.
- **Secure Authentication System**: User authentication and session management using **Laravel Sanctum**.
- **Scalable Design and Maintainability**: Utilizes TDD (Test Driven Development) and DDD (Domain Driven Design) to
  ensure a solid architecture.
- **Modern Technologies**: The project integrates and tests concepts like Design Patterns (Strategy, Factory Method),
  and uses **PostgreSQL** for the database.

## Technologies Used

- **Backend**: PHP 8.3 with Laravel 11
- **Frontend**: Vue.js 3
- **Database**: PostgreSQL 16
- **Authentication**: Laravel Sanctum
- **Development**: TDD, DDD
- **Design Patterns**: Strategy, Factory Method

## Installation

### Prerequisites

- PHP 8.3 or higher
- Composer
- Node.js and npm
- PostgreSQL

### Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/gollumeo/group-finder.fr.git
   cd group-finder.fr
    ```
2. Install the backend dependencies with Composer:
    ```bash
   composer install
   ```
3. Install the frontend dependencies with npm:
    ```bash
    npm install
    ```
4. Setup the environment:
    ```bash
    cp .env.example .env
    ```
5. Generate the application key:
    ```bash
    php artisan key:generate
    ```
6. Create the database and run the migrations:
    ```bash
    php artisan migrate
    ```
7. Start the development server:
    ```bash
    php artisan serve
   npm run dev
    ```
8. Access the application at `http://localhost:8000` (unless you're using tools like Valet, Herd or Laragon). 

## License

This project is open source and available under the [MIT License](LICENSE).
