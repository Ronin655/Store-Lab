<?php

namespace App\Http\Controllers;

use App\Actions\StoreTask;
use App\Actions\UpdateTask;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskCollectionResource;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController
{
    public function index(): TaskCollectionResource
    {
        $tasks = Task::query()->get();

        return new TaskCollectionResource($tasks);
    }

    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    public function store(StoreTaskRequest $request): TaskResource
    {;
        $task = (new StoreTask())->store($request);

        return new TaskResource($task);
    }

    public function update(Request $request, Task $task): TaskResource
    {
        $task = (new UpdateTask())->update($request, $task);

        return new TaskResource($task);
    }

    /**
     * @throws Exception
     */
    public function destroy(Task $task): Response
    {
        $task->delete();

        return response()->noContent();
    }
}
