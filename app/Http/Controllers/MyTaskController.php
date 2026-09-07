<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;

class MyTaskController extends Controller
{
    public function myTasks()
    {
        $tasks = Task::where('due_date', '>=', Carbon::today())->get();

        return view('my-tasks', compact('tasks'));
    }
}
