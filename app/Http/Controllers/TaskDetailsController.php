<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class TaskDetailsController extends Controller
{
    public function show(int $id): View
    {
        $task = Task::findOrFail($id);

        return view('task-details', compact('task'));
    }
}
