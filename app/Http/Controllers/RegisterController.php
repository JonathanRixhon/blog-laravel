<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function store()
    {
        //Create the user
        $attributes = request()->validate(
            [
                'name' => 'required|max:255',
                //'username' => 'required|max:255|min:3',
                'email' => 'required|email|max:255',
                'password' => 'required|max:255',
            ]
        );
        $attributes['slug'] = Str::slug($attributes['email']);

        User::create($attributes);

        return redirect('/');

    }

    public function create()
    {
        return view('register.create');
    }
}
