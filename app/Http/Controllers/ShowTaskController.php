<?php

namespace App\Http\Controllers;

use App\Models\Task;

class ShowTaskController
{
    public function showTasks(int $id)
    {
        $task = Task::query()->where('id', $id)->firstOrFail();

        return response()->json([
            'task' => $task
       ]);

    }
}
