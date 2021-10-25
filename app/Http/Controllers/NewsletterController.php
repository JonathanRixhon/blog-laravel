<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try
        {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e)
        {
            throw ValidationException::withMessages([
                'email' => 'this email could not be added in our database.'
            ]);
        }
        return redirect('/')->with('success', "You are now signed in for our newsletter !");

    }
}
