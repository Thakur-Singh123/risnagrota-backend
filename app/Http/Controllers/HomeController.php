<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Get auth detail
        $user = Auth::user();
        //Check if user type 
        if ($user->user_type == 'Admin') {
            return redirect('admin/all-student-admissions');
        } else {
            return view('home');
        }
    }
}
