<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\Candidate;
use App\Models\Agency;
use App\Models\Employer;
use App\Models\Circular;
use App\Models\TrainingCenter;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {

            return view('welcome');
        }

        return redirect('/login');

    }

    public function logout()
    {
        Auth::logout();

        return redirect("/login");
    }
    public function home()
    {

        return view('welcome');
    }
}
