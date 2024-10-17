# Covid

## Installation

### Prerequisites

-   PHP 7.4 or higher
-   Composer
-   Laravel 8.x or higher
-   MySQL or another supported database

## Installation

To set up this project locally, follow these steps:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/aarifhsn/covid.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd covid
    ```

3. **Install dependencies:**

    ```bash
    composer install
    ```

4. **Set up environment file:**

    Copy the example environment file and set up your environment variables:

    ```bash
    cp .env.example .env
    ```

5. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

6. **Run migrations (if applicable):**

    ```bash
    php artisan migrate
    ```

7. **Start the development server:**

    ```bash
    php artisan serve
    ```

8. **Run development server:**

    ```bash
    npm run dev
    ```

9. **Access the application:**

    Open your browser and go to [http://localhost:8000](http://localhost:8000).
