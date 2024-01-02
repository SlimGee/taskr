<?php

namespace App\Http\Controllers;

use App\Enum\TaskStatus;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $user = auth()->user();

        $counts = $user->tasks()
            ->select('status')
            ->get()
            ->groupBy('status')
            ->map(fn ($tasks) => $tasks->count());

        return view('app.home.index', [
            'pendingTasks' => $counts[TaskStatus::PENDING->value],
            'completedTasks' => $counts[TaskStatus::COMPLETED->value],
            'inProgressTasks' => $counts[TaskStatus::IN_PROGRESS->value],
            'allTasks' => $counts->sum(),
        ]);

    }
}
