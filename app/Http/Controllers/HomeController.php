<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudiantes;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalUsers = User::all()->count();
        $totalAdmin = User::where('rol','Admin')->count();
        $totalAlumnos = User::where('rol','Estudiante')->count();
        $totalDocentes = User::where('rol','Docente')->count();

        return view('pages.dashboard', compact('totalUsers', 'totalAdmin','totalAlumnos','totalDocentes'));
    }
}
