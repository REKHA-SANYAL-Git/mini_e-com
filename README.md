# Mini E-Commerce Project

## Overview

This is a Mini E-Commerce project built with Laravel for the backend and includes API functionalities for managing products, orders, and user authentication. It also supports user registration, login, and order management.

## Features

- **User Authentication**: Register and log in using API endpoints.
- **Product Management**: Create, read, update, and delete products.
- **Order Management**: Place and view orders.
- **Admin Dashboard**: View all orders and manage products.
- **Stock Management**: Automatically reduces product stock when an order is placed.

## Installation

### Prerequisites

- PHP 8.1 or higher
- Composer
- Laravel 10
- MySQL or another supported database

### Steps to Install

1. **Clone the Repository**

   git clone <repository-url>
   cd <project-directory>

2. **Clone the Repository**

 composer install

3. **Set Up Environment Variables**

Copy or Rename the .env.example file to .env:

4. **Generate Application Key**

php artisan key:generate

5. **Run Migration**

php artisan migrate

6. **Seed the database**

php artisan db:seed

6. **Serve the application**
php artisan serve




