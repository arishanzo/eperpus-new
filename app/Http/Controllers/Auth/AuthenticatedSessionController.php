<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
     $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:8',
        ],
        [
            'username.required' => 'Nama wajib diisi.',
            'username.string' => 'Nama harus berupa teks.',
            'username.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'password.required' => 'Password Harus Diisi.',
            'password.max' => 'Password Max 8 Karakter.',
        ]
    
    );

    $credentials = $request->only('username', 'password');

    if (auth()->attempt($credentials)) {
        

        $user = User::where('username', $request->username)->first();
        $request->session()->regenerate();
        
        Auth::login($user);

        return redirect('/')->with('success', 'Berhasil Login.');;
    }

    

    return back()->withErrors([
        'username' => 'Username Anda Salah',
        
        'password' => 'Password Anda Salah',
    ]);

           }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
