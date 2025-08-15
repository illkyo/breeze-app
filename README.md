# Breeze App

This is a web application developed using the Laravel framework. This application implements a hotel room booking, ferry operations and a park ticket overseeing system that also features user management. The concept of the application is based on a theme park island that has island travel between three locations, the theme park island, the mainland country and a hotel.

## Table of Contents

- [Requirements](#requirements)  
- [Installation](#installation)  
- [Environment Setup](#environment-setup)  
- [Running the Application](#running-the-application)  
- [Database Setup](#database-setup)

## Requirements

- PHP >= 8.x  
- Composer  
- Laravel 10.x  
- MySQL
- Node.js & NPM (for frontend assets)

## Installation

Clone the repository:

```bash
git clone https://github.com/illkyo/breeze-app.git
cd project-name
```

Install PHP dependencies:

```bash
composer install
```

Install Frontend dependencies:

```bash
npm install
```

## Environment Setup

```bash
cp .env.example .env
```

Update .env file with local database credentials and other configuration:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=secret
```

Generate application key:

```bash
php artisan key:generate
```

## Running the Application

Run the development server then run the frontend vite server:

```bash
php artisan serve
npm run dev
```

Or Run both server:

```bash
composer run dev
```

## Running the Database

Run migrations and or seed the database:

```bash
php artisan migrate
php artisan db:seed 
```