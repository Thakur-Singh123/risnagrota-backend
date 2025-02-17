<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
   {
      //Get auth detail
      $user = Auth::user();
      //Check if auth type
      if ($user->user_type == "Admin") {
         return $next($request);
      } else {
         return redirect('login');
      }
   }
}
