@extends('dash')

@section('title', 'Admin')


@section('content')
    <section class="container px-4 mx-auto md:px-8">
        <div class="flex items-baseline pt-8 pb-8">
            <div class="flex-1">
                <h1 class="text-4xl font-medium dark:text-white text-slate-900">
                    {{ Carbon\Carbon::greet() }}, {{ auth()->user()->name }}
                </h1>
                <p class="mt-3 mb-4 text-lg font-normal text-slate-500 dark:text-slate-400">
                    This is the dashboard. You can do anything from here.
                </p>
            </div>
        </div>

        <div class="flex items-stretch mx-auto space-x-6 w-full">
            <div class="p-3 w-3/12 rounded border shadow dark:border-slate-700">
                <div class="text-slate-800 dark:text-slate-100">Pending</div>
                <div class="mt-3 text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $pendingTasks }}</div>
            </div>
            <div class="p-3 w-3/12 rounded border shadow dark:border-slate-700">
                <div class="text-slate-800 dark:text-slate-100">In Progress</div>
                <div class="mt-3 text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $inProgressTasks }}</div>
            </div>
            <div class="p-3 w-3/12 rounded border shadow dark:border-slate-700">
                <div class="text-slate-800 dark:text-slate-100">Completed</div>
                <div class="mt-3 text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $completedTasks }}</div>
            </div>
            <div class="p-3 w-3/12 rounded border shadow dark:border-slate-700">
                <div class="text-slate-800 dark:text-slate-100">All tasks</div>
                <div class="mt-3 text-3xl font-bold text-slate-900 dark:text-slate-100">{{ $allTasks }}</div>
            </div>



        </div>
    </section>
@endsection
