<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Task;
use Illuminate\View\View;
use App\Http\Requests\StoreTaskRequest;


class TaskAddController extends Controller
{
    public function create(): View
    {
        return view('admin-add-task');
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        Task::create($request->validated());

        return redirect('/admin-panel');
    }

    public function index(): View
    {
        $tasks = Task::all();
        return view('admin-add-task', compact('tasks'));
    }

    public function showAssignments(): View
    {
        $tasks = Task::latest()->get();
        return view('admin-panel', compact('tasks'));
    }
}
