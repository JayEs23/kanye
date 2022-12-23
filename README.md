## Kanye West Quotes

A web application that displays random Kanye West quotes and allows users to refresh the quotes.

### Prerequisites

- PHP 7.3 or higher
- A web server (such as Apache or Nginx)
- Composer

### Installation

1. Clone the repository: `git clone https://github.com/your-username/kanye-west-quotes.git`
2. Navigate to the project directory: `cd kanye-west-quotes`
3. Install dependencies: `composer install`
4. Copy the example environment file: `cp .env.example .env`
5. Generate an app key: `php artisan key:generate`
6. Set up the database connection in the `.env` file
7. Run the migrations: `php artisan migrate`
8. Run the database seeding to populate the database from the kanye.rest API
9. Start the development server: `php artisan serve`

### Testing

To run the tests, use the `php artisan test` command.

### Note

- The quotes API route is secured with a token. You will need to set the `API_TOKEN` environment variable in the `.env` file to the correct value in order to access the API.

