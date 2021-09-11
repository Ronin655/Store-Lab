<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CreateTaskController
{
    public function create(Request $request)
    {
        $type = $request->get('type');
        $name = $request->get('name');
        $completed = $request->get('completed');

        $task = new Task();
        $task->name = $name;
        $task->type = $type;
        $task->completed = $completed;
        $task->save();

        return response()->json([
            'id' => $task->id,
        ]);
    }

}
