<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\View\View;

class MyTaskController extends Controller
{
    public function myTasks(): View
    {
        $tasks = Task::where('due_date', '>=', Carbon::today())->get();

        return view('my-tasks', compact('tasks'));
    }
}
