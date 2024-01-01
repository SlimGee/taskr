<?php

namespace App\Http\Controllers;

use App\Enum\TaskStatus;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $tasks = QueryBuilder::for(auth()->user()->tasks()->getQuery())
            ->allowedFilters(['title', 'description', 'status'])
            ->allowedSorts('title', 'status', 'created_at')
            ->paginate(7)
            ->withQueryString();

        return view('app.tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        return view('app.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        auth()->user()
            ->tasks()
            ->create([
                ...$request->validated(),
                'status' => TaskStatus::PENDING,
            ]);

        return to_route('tasks.index')
            ->with('success', 'Task was successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): Renderable
    {
        return view('app.tasks.show', [
            'task' => $task,
        ]);
    }

    /**
     * Update the task status.
     */
    public function status(Task $task, TaskStatus $status): RedirectResponse
    {
        $task->update([
            'status' => $status,
        ]);

        return back(fallback: route('tasks.index'))->with('success', "Task status was successfully updated to \"{$status->label()}\"");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): Renderable
    {
        return view('app.tasks.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return to_route('tasks.index')
            ->with('success', 'Task was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return to_route('tasks.index')->with('success', 'Task was successfully removed');
    }
}
