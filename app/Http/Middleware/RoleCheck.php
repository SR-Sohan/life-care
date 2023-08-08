<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $allowedRoles = ['super_admin', 'branch_admin', 'doctor', 'lab', 'reception', 'cashier', 'report'];
        
        if (!$user || !in_array($user->role, $allowedRoles)) {
            return redirect()->to("/");
        }
        return $next($request);
    }
}
