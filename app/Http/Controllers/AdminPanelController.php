<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class AdminPanelController extends Controller
{
    public function index(): View
    {
        $tasks = Task::all();

        return view('admin-panel', compact('tasks'));
    }
}
