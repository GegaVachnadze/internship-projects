<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;


class DeleteTableController extends Controller
{
    public function clearTask(int $id): RedirectResponse
    {
        $task = Task::find($id);

        if ($task) {
            $task->delete();
        }

        return redirect('/admin-panel');
    }
}
