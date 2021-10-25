<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        $user = auth()->user()->username;
        auth()->logout();
        return back()->with('success', 'Goodbye ' . $user);
    }

    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        //validate the form
        $attributes = request()->validate([
            'email' => 'required|max:255|exists:users,email',
            'password' => ['required', 'max:255'],
        ]);

        //$credentials = request()->only('email', 'password');

        if (!auth()->attempt($attributes))
        {
            throw ValidationException::withMessages(['email' => "Your credentials didn't match our records", 'password' => "Your credentials didn't match our records",]);
        }
        request()->session()->regenerate();
        return redirect(RouteServiceProvider::HOME)
            ->with('success', 'Welcome back ' . auth()->user()->name);
    }
}
