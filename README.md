# Laravel Todo API

A simple Todo API built with Laravel, using the repository and service pattern.

## Features

- RESTful API for managing todos
- CRUD operations: list, create, update status, delete
- SQLite database for easy setup
- Clean architecture with Repository and Service layers

## Requirements

- PHP 8.1+
- Composer
- [Optional] Postman or similar API client

## Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/your-repo-name.git
   cd your-repo-name
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Copy the example environment file and generate an app key**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure SQLite database**
   - In your `.env` file, set:
     ```
     DB_CONNECTION=sqlite
     DB_DATABASE=${PWD}/database/database.sqlite
     ```
   - Create the SQLite database file:
     ```bash
     touch database/database.sqlite
     ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Run the development server**
   ```bash
   php artisan serve
   ```
   The API will be available at `http://127.0.0.1:8000`.

## API Endpoints

| Method | Endpoint           | Description                |
|--------|--------------------|----------------------------|
| GET    | /api/todos         | List all todos             |
| POST   | /api/todos         | Create a new todo          |
| PUT    | /api/todos/{id}    | Update todo status         |
| DELETE | /api/todos/{id}    | Delete a todo              |

### Example Requests

- **Create Todo**
  ```json
  POST /api/todos
  {
    "title": "Buy groceries"
  }
  ```

- **Update Todo Status**
  ```json
  PUT /api/todos/1
  {
    "title": "Buy Water",
    "completed": true
  }
  ```

## Testing the API

You can use [Postman](https://www.postman.com/) to test the endpoints.

---

## License

MIT