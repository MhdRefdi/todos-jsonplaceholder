
# todos-placeholder

dummy api todolist use laravel 8 system and jwt auth.






## Installation

Install todos-placeholder with github

```bash
  # install
  git clone https://github.com/MhdRefdi/todos-jsonplaceholder.git
  cd todos-placeholder

  # laravel setup
  composer i
  php artisan key:generate
  php artisan jwt:secret
  php artisan migrate --seed
  php artisan serve
```
    
## API Todolist (Without Authentication)

#### Get all todolists

```http
  GET /api/todolist
```

#### Get todolist

```http
  GET /api/todolist/:id
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `integer` | **Required** |

#### Store todolist

```http
  POST /api/todolist
```

#### Update todolist

```http
  POST /api/todolist/:id
```

| Variable | Type | Data Type | Description |
| :-------- | :------- | :------- | :-------  
| `id`      | `parameter` | `integer` | **Required** |
| `_method`      | `body` | `string (PUT)` | **Required** |
| `title`      | `body` | `string` | **Required** |
| `completed`      | `body` | `boolean` | **Opsional** |

#### Delete todolist

```http
  DELETE /api/todolist/:id
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `integer` | **Required** |
