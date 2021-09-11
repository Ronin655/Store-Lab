<?php

namespace App\Http\Controllers;

use App\Models\Task;

class IndexTaskController
{
    public function index()
    {
        $tasks = Task::query()->get();

        return response()->json([
            'tasks' => $tasks
        ]);
    }
}
