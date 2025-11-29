<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'exists:users,phone'],
            'password' => ['required', 'string'],
        ]);

        $credentials = [
            'phone' => $request->phone,
            'password' => $request->password,
        ];

        // Check if admin exists with this phone and is active
        $user = User::where('phone', $request->phone)
            ->active()
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'phone' => __('The provided credentials do not match our records.'),
            ]);
        }

        // Log the admin in
        Auth::login($user, $request->boolean('remember'));

        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }
}
