<?php

namespace App\Http\Controllers\Front\Task;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }

    public function create()
    {
        return view('frontend.task.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'theme' => 'required',
            'description' => 'required',
            'attachements' => 'required|mimes:xlsx,doc,docx,txt|max:2048',
            'start_time' => 'required|after:now ' . \Carbon\Carbon::now()->format('H:i:s'),
            'end_time' => 'required|after:start_time',
        ]);

        $fileName = time() . '.' . $request->attachements->extension();
        $request->attachements->storeAs('public/images', $fileName);
        $customer = Customer::find(Auth::guard('frontend')->user()->id);

        Task::create([
            'customer_id' => $customer->id,
            'theme' => $request->theme,
            'description' => $request->description,
            'attachements' => $fileName,
            'start_time' => date_create_from_format('H:i', $request->start_time),
            'end_time' => date_create_from_format('H:i', $request->end_time)
        ]);

        return redirect()->route('frontend.home');
    }
}
