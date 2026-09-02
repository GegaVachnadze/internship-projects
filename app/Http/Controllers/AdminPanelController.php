<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Task;

class AdminPanelController extends Controller
{
    public function changeLocale(string $locale): RedirectResponse
    {
        if (in_array($locale, ['ka', 'en'])) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title_en' => ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s.,!?]+$/'],
            'title_ka' => ['required', 'string', 'min:3', 'regex:/^[ა-ჰ0-9\s.,!?]+$/'],
            'description_en' => ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s.,!?]+$/'],
            'description_ka' => ['required', 'string', 'min:3', 'regex:/^[ა-ჰ0-9\s.,!?]+$/'],
            'due_date' => ['required', 'date'],
        ]);

        Task::create($request->all());

        return redirect('/tasks');
    }
}
