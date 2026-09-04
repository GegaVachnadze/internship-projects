<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Task;
use Illuminate\View\View;
use App\Http\Requests\EditTaskRequest;

class EditTaskController extends Controller
{
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
}
