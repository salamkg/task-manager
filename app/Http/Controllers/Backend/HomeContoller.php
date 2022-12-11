<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeContoller extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(20);
        return view('backend.home.index', [
            'tasks' => $tasks
        ]);
    }
}
