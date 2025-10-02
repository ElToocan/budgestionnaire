# Laravel Project 🚀

This is a Laravel project that provides a foundation for building web applications. It includes features for managing transactions, budgets, and user authentication. This project aims to provide a streamlined and efficient development experience with a focus on maintainability and scalability.

## 🚀 Key Features

- **Transaction Management**: Create, view, and delete financial transactions.
- **Budgeting**: Define and manage budgets to track spending.
- **User Authentication**: Secure user authentication system.
- **Dashboard**: A central dashboard providing an overview of key data.
- **Database Configuration**: Configured for various database systems (MySQL, PostgreSQL, SQLite, etc.).
- **Caching**: Implements caching strategies for improved performance.
- **Service Integration**: Ready for integration with third-party services like Postmark, Resend, SES, and Slack.
- **Artisan Console**: Includes custom Artisan commands for automating tasks.
- **Web Routes**: Defines web routes for handling HTTP requests.

## 🛠️ Tech Stack

- **Backend**:
    - PHP: ^8.2
    - Laravel Framework: ^12.0
    - Laravel Tinker: ^2.10.1
- **Frontend**:
    - JavaScript (ES Modules)
    - Tailwind CSS
- **Build Tools**:
    - Vite
    - npm/Yarn
    - Composer
- **Database**:
    - Configured for MySQL, PostgreSQL, SQLite, SQL Server
- **Caching**:
    - Redis (optional)
- **Development Dependencies**:
    - fakerphp/faker
    - laravel/pail
    - laravel/pint
    - laravel/sail
    - mockery/mockery
    - nunomaduro/collision
    - phpunit/phpunit
- **Packages**:
    - axios
    - concurrently
    - laravel-vite-plugin
    - @tailwindcss/vite

## 📦 Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js
- npm or Yarn
- A database system (MySQL, PostgreSQL, SQLite, etc.)

### Installation

1.  Clone the repository:

    ```bash
    git clone <repository-url>
    cd <project-name>
    ```

2.  Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

3.  Install JavaScript dependencies using npm or Yarn:

    ```bash
    npm install # or yarn install
    ```

4.  Copy the `.env.example` file to `.env` and configure your environment variables:

    ```bash
    cp .env.example .env
    ```

    Edit the `.env` file to set up your database connection, application URL, and other settings.

5.  Generate an application key:

    ```bash
    php artisan key:generate
    ```

6.  Run database migrations:

    ```bash
    php artisan migrate
    ```

### Running Locally

1.  Start the Laravel development server:

    ```bash
    php artisan serve
    ```

2.  Start the Vite development server:

    ```bash
    npm run dev # or yarn dev
    ```

    This will compile the front-end assets and enable hot module replacement (HMR).

3.  Access the application in your browser at the URL specified by `php artisan serve` (usually `http://localhost:8000`).

## 📂 Project Structure

```
├── app/                      # Application code
│   ├── Console/              # Artisan commands
│   ├── Exceptions/           # Exception handling
│   ├── Http/                 # HTTP controllers, middleware, requests
│   │   ├── Controllers/      # Application controllers
│   │   ├── Middleware/       # HTTP middleware
│   ├── Models/               # Eloquent models
├── bootstrap/                # Bootstrapping and configuration
├── config/                   # Application configuration files
├── database/                 # Database migrations and seeds
├── lang/                     # Language files
├── public/                   # Publicly accessible files
├── resources/                # Assets, views, and language files
│   ├── css/                  # CSS files
│   ├── js/                   # JavaScript files
│   ├── views/                # Blade templates
├── routes/                   # Route definitions
│   ├── console.php           # Console routes
│   ├── web.php               # Web routes
├── storage/                  # Storage for files and sessions
├── tests/                    # Application tests
├── vendor/                   # Composer dependencies
├── artisan                   # Artisan command-line tool
├── composer.json             # Composer configuration file
├── package.json              # Node.js package manifest file
├── phpunit.xml               # PHPUnit configuration file
├── vite.config.js            # Vite configuration file
└── webpack.mix.js            # Webpack configuration file (if applicable)
```

## 📸 Screenshots

<img width="1921" height="927" alt="image" src="https://github.com/user-attachments/assets/852e3da2-e61d-4bb1-97ae-8deb2399d842" />

<img width="1921" height="927" alt="image" src="https://github.com/user-attachments/assets/69c181c5-17bd-4058-a500-a038ce20d505" />

<img width="1921" height="927" alt="image" src="https://github.com/user-attachments/assets/ef964778-a314-4716-b0f1-21a6cd27799a" />


## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1.  Fork the repository.
2.  Create a new branch for your feature or bug fix.
3.  Make your changes and commit them with descriptive messages.
4.  Submit a pull request.

## 📬 Contact

For questions or feedback, please contact: Pino Gabriele - gabriele.pno@gmail.com

💖 Thanks for checking out this project! We hope it helps you build amazing web applications.

