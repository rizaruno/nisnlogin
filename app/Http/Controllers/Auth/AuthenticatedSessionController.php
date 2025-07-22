<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses autentikasi berbasis NISN.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'nisn' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt(['nisn' => $credentials['nisn'], 'password' => $credentials['password']])) {
            throw ValidationException::withMessages([
                'nisn' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    /**
     * Logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
