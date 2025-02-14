<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{


   
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login(){
        return view('admin/login');
    }

    public function login_submit(Request $request) 
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->attempt(['email' => $email, 'password' => $password, 'user_type' => 'admin']) || auth()->attempt(['email' => $email, 'password' => $password, 'user_type' => 'customer'])) { 
           
            $user = Auth::user();
            if ($user->user_type == "admin") {
                return redirect('admin-dashboard'); 
            } else {
                return redirect('admin-login');
            }
    
        } else {
            return back()->with('error', 'Invalid Email and Password');
        }
    
    }
}
    
      





