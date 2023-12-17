<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // Cek guard yang sedang aktif
            $guard = current(explode('.', request()->route()->getName()));

            // Redirect ke login admin jika guard adalah 'admin'
            if ($guard === 'admin') {
                session()->flash('success', 'Silahkan login terlebih dahulu');
                return route('login.admin');
            }

            // Redirect ke login user jika guard adalah 'web' (default)
            return route('login');
        }
    }
}
