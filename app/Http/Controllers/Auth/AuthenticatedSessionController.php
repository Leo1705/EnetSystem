<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**P
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        // This will validate & attempt login (via your LoginRequest)
        $request->authenticate();

        // Prevent session fixation
        $request->session()->regenerate();

        // Redirect to intended page (or fallback to HOME)
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // After logout, send them to the login page
        return redirect()->route('login');
    }
}
