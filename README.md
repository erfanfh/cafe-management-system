## Cafe Management System

* With this system you can manage your cafe tables, orders, bills, customers, etc.

* This is a free open source application, feel free to use it locally.

## Getting Started

These instructions will get you a copy of the application up and running on your local machine for using.

## Prerequisites

- PHP >= 8.2
- Composer
- MySQL or any other supported database

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/erfanfh/cafe-management-system.git
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Copy the example environment file and configure the environment:**

    ```bash
    cp .env.example .env
    ```

   Update the `.env` file with your database and other configurations.

4. **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

5. **Start the development server:**

    ```bash
    php artisan serve
    ```

   The application will be available at `http://localhost:8000`.
