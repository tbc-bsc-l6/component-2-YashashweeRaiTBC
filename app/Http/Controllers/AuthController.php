<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register', [
            'title' => 'Register Page'
        ]);
    
    }

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect("/dashboard");
        }

        return view('auth.login', [
            "title" => "Login"
        ]);
    
    }

    public function register(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8', 
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        Auth::login($user);
        return redirect()->route('home');
    }


    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string', 
        ]);
 
        if(Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Sorry, incorrect credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();   

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

}