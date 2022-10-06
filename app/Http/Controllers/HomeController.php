<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\student_account;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {

        return view('dashboard' );
    }
}
