<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalGuru = Guru::count();

        return view('dashboard', compact('totalUser', 'totalGuru'));
    }
}
