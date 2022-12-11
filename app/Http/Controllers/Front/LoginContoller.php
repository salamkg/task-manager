<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginContoller extends Controller
{
    public function loginForm()
    {
        dump('form');
        return view('frontend.auth.form');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->guard('frontend')->attempt($request->only(['email', 'password']), true)) {
            $user = auth()->guard('frontend')->user();
            return redirect()->route('frontend.task.form');
        }
        return back()->with('Login details are not valid');
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('frontend')->logout();

        return redirect()->route('frontend.home');
    }
}
