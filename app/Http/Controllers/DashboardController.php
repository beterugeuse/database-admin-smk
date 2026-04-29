<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalGuru = Guru::count();
        $totalSiswa = Siswa::count();

        return view('dashboard', compact('totalUser', 'totalGuru', 'totalSiswa'));
    }
}
