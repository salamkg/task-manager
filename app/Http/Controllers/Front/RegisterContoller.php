<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterContoller extends Controller
{
    public function registerForm()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:4',
        ]);

        $data = $request->all();
        $this->create($data);

        return redirect()->route('frontend.auth.form');
    }

    public function create(array $data)
    {
        $customer = Customer::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return $customer;
    }
}
