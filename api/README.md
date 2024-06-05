# Laravel Sail Local Setup

This guide will help you set up Laravel Sail for local development.

## Prerequisites

- Docker: Laravel Sail is a Docker-based development environment. Make sure you have Docker installed on your machine. You can download Docker from [here](https://www.docker.com/products/docker-desktop).

## Steps

1. **Clone the repository**

   First, clone the Laravel project repository to your local machine.

    ```bash
    git clone <repository-url>
    ```

   Replace `<repository-url>` with the actual URL of your repository.

2. **Navigate to the project directory**

   Navigate to the root directory of the project.

    ```bash
    cd <project-directory>
    ```

   Replace `<project-directory>` with the actual directory of your project.

3. **Start Laravel Sail**

   Laravel Sail is built into your Laravel project. To start Sail, run the following command in your terminal:

    ```bash
    ./vendor/bin/sail up
    ```

   If you want to run Sail in the background, you can add the `-d` option:

    ```bash
    ./vendor/bin/sail up -d
    ```

3. **Migrate db**

   Copy .env.example to .env and update db credentials

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

   If you want to run Sail in the background, you can add the `-d` option:

    ```bash
    ./vendor/bin/sail up -d
    ```

4. **Access the application**

   Once Sail is up and running, you can access your Laravel application in your web browser at: [http://localhost](http://localhost)

## Running Tests with PestPHP
```bash
./vendor/bin/sail test
```

## Static Analysis with PHPStan
```
./vendor/bin/phpstan analyze
```

## Linting with Laravel Pint
```
./vendor/bin/pint
```