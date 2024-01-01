@extends('dash')

@section('title', 'Admin')


@section('content')
    <section class="container px-4 mx-auto md:px-8">
        <div class="flex items-baseline pt-8 pb-8">
            <div class="flex-1">
                <h1 class="text-4xl font-medium dark:text-white text-slate-900">Tasks</h1>
                <p class="mt-3 mb-4 text-lg font-normal text-slate-500 dark:text-slate-400">
                    Create and manage tasks
                </p>
            </div>
            <div>
                <a href="{{ route('tasks.create') }}">
                    <x-secondary-button class="dark:bg-slate-800">
                        <span class="mr-1 material-symbols-outlined">
                            add_circle
                        </span>
                        New task
                    </x-secondary-button>
                </a>
            </div>
        </div>



        <div class="w-full">

            <div class="">
                <div class="justify-between items-center sm:flex">
                    <div class="flex items-center">
                        <a class="rounded-full focus:bg-indigo-50 focus:ring-2 focus:ring-indigo-800 focus:outline-none"
                            href=" javascript:void(0)">
                            <div class="py-2 px-8 text-indigo-700 bg-indigo-100 rounded-full">
                                <p>All</p>
                            </div>
                        </a>
                        <a class="ml-4 rounded-full sm:ml-8 focus:bg-indigo-50 focus:ring-2 focus:ring-indigo-800 focus:outline-none"
                            href="javascript:void(0)">
                            <div
                                class="py-2 px-8 rounded-full hover:text-indigo-700 hover:bg-indigo-100 text-slate-600 dark:text-slate-200">
                                <p>Done</p>
                            </div>
                        </a>
                        <a class="ml-4 rounded-full sm:ml-8 focus:bg-indigo-50 focus:ring-2 focus:ring-indigo-800 focus:outline-none"
                            href="javascript:void(0)">
                            <div
                                class="py-2 px-8 rounded-full hover:text-indigo-700 hover:bg-indigo-100 text-slate-600 dark:text-slate-200">
                                <p>Pending</p>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="overflow-x-auto mt-7">
                    <div class="w-full whitespace-nowrap">
                        <div class="space-y-3">
                            @foreach ($tasks as $task)
                                <div tabindex="0"
                                    class="flex justify-between items-center px-4 space-x-4 w-full h-16 rounded border focus:outline-none border-slate-100 dark:border-slate-700">
                                    <div class="w-3/12">
                                        <div class="flex items-center">
                                            <a href="{{ route('tasks.edit', $task) }}"
                                                class="mr-2 text-base font-semibold leading-none underline dark:text-white text-slate-700">
                                                {{ $task->title }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="w-3/12">
                                        <div class="flex items-center">
                                            <span class="material-symbols-outlined text-slate-600 dark:text-slate-200">
                                                schedule
                                            </span>
                                            <p class="ml-2 text-sm leading-none text-slate-600 dark:text-slate-200">
                                                {{ $task->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="pl-5">
                                        <button class="{{ $task->status->classes() }}">
                                            {{ $task->status->label() }}
                                        </button>
                                    </div>
                                    <div class="w-3/12">
                                        @if ($task->status == App\Enum\TaskStatus::IN_PROGRESS)
                                            <a href="{{ route('tasks.status', ['task' => $task, 'status' => App\Enum\TaskStatus::COMPLETED->value]) }}"
                                                data-turbo-method="patch">
                                                <x-secondary-button>
                                                    Mark as complete
                                                </x-secondary-button>
                                            </a>
                                        @elseif($task->status == App\Enum\TaskStatus::PENDING)
                                            <a href="{{ route('tasks.status', ['task' => $task, 'status' => App\Enum\TaskStatus::IN_PROGRESS->value]) }}"
                                                data-turbo-method="patch">
                                                <x-secondary-button>Start this task</x-secondary-button>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="flex justify-end items-center space-x-6 w-3/12">
                                        <a href="{{ route('tasks.show', $task) }}">
                                            <x-secondary-button class="">
                                                View
                                            </x-secondary-button>
                                        </a>
                                        <a href="{{ route('tasks.destroy', $task) }}" data-turbo-method="delete"
                                            data-turbo-confirm="Are you sure?">
                                            <x-secondary-button class="!border-none !bg-transparent !text-red-400">
                                                <span class="material-symbols-outlined">
                                                    delete
                                                </span>
                                            </x-secondary-button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
