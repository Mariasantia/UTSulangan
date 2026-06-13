<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('due_date')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'required|date'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date
        ]);

        return redirect('/')
            ->with('success', 'Tugas berhasil ditambahkan');
    }

    public function edit(Task $task)
    {
        if ($task->is_completed) {
            return redirect('/');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->is_completed) {
            return redirect('/');
        }

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date
        ]);

        return redirect('/')
            ->with('success', 'Tugas berhasil diperbarui');
    }

    public function destroy(Task $task)
    {
        if (!$task->is_completed) {
            $task->delete();
        }

        return redirect('/')
            ->with('success', 'Tugas berhasil dihapus');
    }

    public function complete(Task $task)
    {
        $task->update([
            'is_completed' => true,
            'completed_at' => now()
        ]);

        return redirect('/')
            ->with('success', 'Tugas selesai');
    }

    public function report(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $tasks = Task::where('is_completed', true)
            ->when($start, fn ($q) => $q->whereDate('completed_at', '>=', $start))
            ->when($end, fn ($q) => $q->whereDate('completed_at', '<=', $end))
            ->get();

        return view('tasks.report', compact('tasks'));
    }

    public function dashboard()
    {
        $total = Task::count();

        $completed = Task::where('is_completed', true)->count();

        $pending = Task::where('is_completed', false)->count();

        $upcoming = Task::where('due_date', '>=', now()->toDateString())
            ->selectRaw('due_date, count(*) as total')
            ->groupBy('due_date')
            ->orderBy('due_date')
            ->get();

        return view(
            'tasks.dashboard',
            compact(
                'total',
                'completed',
                'pending',
                'upcoming'
            )
        );
    }
}