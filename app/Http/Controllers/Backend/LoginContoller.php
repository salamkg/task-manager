<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginContoller extends Controller
{
    public function loginForm()
    {
        dump('form');
        return view('backend.auth.form');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->guard('backend')->attempt($request->only(['email', 'password']), true)) {
            $user = auth()->guard('backend')->user();
            return redirect()->route('backend.home');
        }
        return back()->with('Login details are not valid');
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('backend')->logout();

        return redirect()->route('backend.auth.form');
    }
}
