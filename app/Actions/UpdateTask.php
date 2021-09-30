<?php

namespace App\Actions;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class UpdateTask
{
    public function update(Request $request, Task $task): Task
    {
        $type = $request->get('type');
        $name = $request->get('name');
        $completed = $request->get('completed');
        if ($name != null) {
            $task->name = $name;
        }
        if ($type != null) {
            $task->type = $type;
        }
        if ($completed != null) {
            $task->completed = $completed;
        }
        $task->save();

        return $task;
    }
}
