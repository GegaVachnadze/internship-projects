<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Models\Expense;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $apartment = $user->apartment ?? null;

        $payments = $apartment ? $apartment->payments()->latest()->get() : collect();

        $announcements = Announcement::latest()->take(5)->get();
        $expenses = Expense::latest()->take(5)->get();

        return view('dashboard', compact('user', 'apartment', 'payments', 'announcements', 'expenses'));
    }
}
