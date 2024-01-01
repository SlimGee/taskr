@extends('dash')

@section('title', 'Admin')
@php
    use App\Enum\TaskStatus;
@endphp

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
                    <div class="flex items-center w-full">
                        <a class="rounded-full focus:bg-indigo-50 focus:ring-2 focus:ring-indigo-800 focus:outline-none text-slate-600 dark:text-slate-200"
                            href="{{ route('tasks.index') }}">
                            <div @class([
                                'py-2 px-8 rounded-full hover:text-indigo-700 hover:bg-indigo-100',
                                'bg-indigo-100 text-indigo-700 dark:text-indigo-700' =>
                                    !request()->has('filter') &&
                                    request()->input('filter', ['status' => null])['status'] == null,
                            ])>
                                <p>All</p>
                            </div>
                        </a>

                        @foreach (TaskStatus::cases() as $status)
                            <a class="ml-4 rounded-full sm:ml-8 focus:bg-indigo-50 focus:ring-2 focus:ring-indigo-800 focus:outline-none text-slate-600 dark:text-slate-200"
                                href="{{ route('tasks.index', 'filter[status]=' . $status->value) }}">
                                <div @class([
                                    'py-2 px-8 rounded-full hover:text-indigo-700 hover:bg-indigo-100',
                                    'bg-indigo-100 text-indigo-700 dark:!text-indigo-700' =>
                                        request()->has('filter') &&
                                        request()->input('filter')['status'] == $status->value,
                                ])>
                                    <p>{{ $status->label() }}</p>
                                </div>
                            </a>
                        @endforeach
                        <div class="relative ml-auto">

                            <div class="inline relative" {{ stimulus_controller('dropdown') }}>
                                <x-secondary-button
                                    class="!rounded-full !py-2.5 !px-2.5 !border-none !bg-transparent hover:!bg-slate-700"
                                    data-action="dropdown#toggle click@window->dropdown#hide">
                                    <span class="sr-only">Open sort dropdown</span>
                                    Sort
                                    <span class="ml-2 material-symbols-outlined">
                                        sort
                                    </span>
                                </x-secondary-button>


                                <div data-dropdown-target="menu"
                                    class="hidden absolute right-0 z-10 m-2 w-56 rounded border ring-1 ring-indigo-500 ring-opacity-25 shadow-lg transition transform origin-top-right dark:border-slate-700 dark:bg-slate-800"
                                    data-transition-enter-from="opacity-0 scale-95"
                                    data-transition-enter-to="opacity-100 scale-100"
                                    data-transition-leave-from="opacity-100 scale-100"
                                    data-transition-leave-to="opacity-0 scale-95">
                                    <ul class="text-slate-700 dark:text-slate-300" aria-labelledby="dropdown">
                                        <li>
                                            <a href="{{ route('tasks.index', 'sort=-created_at') }}"
                                                class="block py-2 px-4 text-sm dark:text-slate-400 dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100">
                                                Date created (newest)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('tasks.index', 'sort=created_at') }}"
                                                class="block py-2 px-4 text-sm dark:text-slate-400 dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100">
                                                Date created (oldest)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('tasks.index', 'sort=title') }}"
                                                class="block py-2 px-4 text-sm dark:text-slate-400 dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100">
                                                Title (A-Z)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('tasks.index', 'sort=-title') }}"
                                                class="block py-2 px-4 text-sm dark:text-slate-400 dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100">
                                                Title (Z-A)
                                            </a>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="overflow-x-auto mt-7">
                    <div class="w-full whitespace-nowrap">
                        <div class="space-y-2">
                            @foreach ($tasks as $task)
                                <div tabindex="0"
                                    class="flex justify-between items-center px-4 space-x-4 w-full h-16 rounded border focus:outline-none border-slate-100 dark:border-slate-700">
                                    <div class="w-5/12">
                                        <div class="flex items-center">
                                            <a href="{{ route('tasks.edit', $task) }}"
                                                class="mr-2 text-base font-semibold leading-none underline dark:text-white text-slate-700">
                                                {{ $task->title }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="flex justify-end w-2/12">
                                        <div class="flex items-center">
                                            <span class="material-symbols-outlined text-slate-600 dark:text-slate-200">
                                                schedule
                                            </span>
                                            <p class="ml-2 text-sm leading-none text-slate-600 dark:text-slate-200">
                                                {{ $task->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end w-1/12">
                                        <button class="{{ $task->status->classes() }}">
                                            {{ $task->status->label() }}
                                        </button>
                                    </div>
                                    <div class="flex justify-end w-2/12">
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
                                    <div class="flex justify-end items-center space-x-6 w-2/12">
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

                        <div class="mt-4">
                            {{ $tasks->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
