<?php

namespace App\Services;

use App\Repositories\TodoRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Todo;

class TodoService
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function getAllTodos($search = null): Collection
    {
        return $this->todoRepository->all($search);
    }

    public function createTodo(array $data): Todo
    {
        return $this->todoRepository->create($data);
    }

    public function updateTodo($id, $data): Todo
    {
        return $this->todoRepository->update($id, $data);
    }

    public function deleteTodo($id): bool
    {
        return $this->todoRepository->delete($id);
    }
}