<?php

namespace App\Actions;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

class StoreTask
{
    public function store(StoreTaskRequest $request): Task
    {
        $type = $request->get('type');
        $name = $request->get('name');
        $completed = $request->get('completed');

        $task = new Task();
        $task->name = $name;
        $task->type = $type;
        $task->completed = $completed;
        $task->save();

        return $task;
    }
}
