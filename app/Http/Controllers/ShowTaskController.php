<?php

namespace App\Http\Controllers;

use App\Models\Task;

class ShowTaskController
{
    public function __invoke(Task $task)
    {
        return response()->json([
            'task' => $task
       ]);
    }
}
