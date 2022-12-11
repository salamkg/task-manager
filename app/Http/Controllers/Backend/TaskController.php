<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function edit(int $id)
    {
        $task = Task::find($id);
        return view('backend.task.edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'theme' => 'required',
            'description' => 'required',
            'attachements' => 'required|mimes:xlsx,doc,docx,txt|max:2048',
            'start_time' => 'required|after:now ' . \Carbon\Carbon::now()->format('H:i:s'),
            'end_time' => 'required|after:start_time',
        ]);

//        $admin = Admin::find(Auth::guard('backend')->user()->id);
        $fileName = '';
        if ($request->hasFile('attachements')) {
            $fileName = time() . '.' . $request->attachements->extension();
            $request->attachements->storeAs('public/images', $fileName);
        }
        $task = Task::find($id);
        $task->theme = $request->theme;
        $task->description = $request->description;
        $task->attachements = $fileName;
        $task->start_time = $request->start_time;
        $task->end_time = $request->end_time;
        $task->is_done = isset($request->is_done) ? 1 : 0;
        $task->update();

        return redirect()->route('backend.home');
    }
}
