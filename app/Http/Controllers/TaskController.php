<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\View\View;


class TaskController extends Controller
{
    //delete
    public function clearTask(int $id): RedirectResponse
    {
        $task = Task::find($id);

        if ($task) {
            $task->delete();
        }

        return redirect('admin-panel');
    }
    //edit

    public function edit(int $id): View
    {
        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }

    public function update(EditTaskRequest $request, int $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());

        return redirect('/admin-panel');
    }
    //update
    public function create(): View
    {
        return view('admin-add-task');
    }

    public function index(): View
    {
        $tasks = Task::all();
        return view('admin-add-task', compact('tasks'));
    }
    //store
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        Task::create($request->validated());

        return redirect('/admin-panel');
    }

    public function showAssignments(): View
    {
        $tasks = Task::latest()->get();
        return view('admin-panel', compact('tasks'));
    }

    //old tasks deleting logic
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

    public function show(int $id): View
    {
        $task = Task::findOrFail($id);

        return view('task-details', compact('task'));
    }

    public function myTasks(): View
    {
        $tasks = Task::where('due_date', '>=', Carbon::today())->get();

        return view('my-tasks', compact('tasks'));
    }
}
