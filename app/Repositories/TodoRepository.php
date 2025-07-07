<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Interface\TodoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TodoRepository implements TodoRepositoryInterface
{
    public function all($search = null): Collection
    {
        $query = Todo::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        return $query->get();
    }

    public function create(array $data): Todo
    {
        return Todo::create($data);
    }

    public function update($id, $data): Todo
    {
        $todo = Todo::findOrFail($id);
        $todo->fill($data);
        $todo->save();
        return $todo;
    }

    public function delete($id): bool
    {
        return Todo::destroy($id);
    }
}
