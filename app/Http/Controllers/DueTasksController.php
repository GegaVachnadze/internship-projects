<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Task;

class DueTasksController extends Controller
{
    public function showPage(): View
    {

        $dueTasks = Task::where('due_date', '<', now())->get();

        return view('due-tasks', compact('dueTasks'));
    }

    public function clearOldTasks()
    {

        Task::where('due_date', '<', now())->delete();

        return redirect()->back();
    }
}
