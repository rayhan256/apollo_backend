<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index() {
        $task = Task::query()->with('user')->get();
        return view('dashboard', ['tasks' => $task]);
    }

    public function createTask(Request $request) {
        $task = new Task();
        $user = Auth::user();
        $name = $request->input('name');

        $task->name = $name;
        $task->status = 0;
        $task->user_id = $user->id;

        $task->save();
        return redirect()->back()->with('pesan', 'Task Added');
    }

    public function updateTask($id) {
        $task = Task::find($id);
        $task->status = 1;
        $task->save();
        return redirect()->back()->with('pesan', 'Task Finished');
    }

    public function deleteTask($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('pesan', 'Task Deleted');
    }

    public function signout() {
        Auth::logout();
        return redirect('/');
    }
}
