<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function destroy()
    {
        $user = auth()->user()->username;
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye ' . $user);
    }

    public function create()
    {
        return view('session.create');
    }
public function store()
    {
        return 'COUCOU';
    }

}
