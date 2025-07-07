<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TodoService;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\TodoResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TodoController extends Controller
{
    protected $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $todos = $this->todoService->getAllTodos($request->search);
        return TodoResource::collection($todos);
    }

    public function store(StoreTodoRequest $request): TodoResource
    {
        $validated = $request->validated();

        $todo = $this->todoService->createTodo($validated);

        return new TodoResource($todo, Response::HTTP_CREATED);
    }

    public function update(UpdateTodoRequest $request, $id): TodoResource
    {
        $validated = $request->validated();
        $todo = $this->todoService->updateTodo($id, $validated);

        return new TodoResource($todo, Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        $this->todoService->deleteTodo($id);

        return response()->json(['message' => 'Todo deleted successfully.'], Response::HTTP_OK);
    }
}
