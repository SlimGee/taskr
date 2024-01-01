@extends('dash')

@section('title', 'Admin')

@section('content')
    <section class="container px-4 mx-auto md:px-8">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('tasks.index') }}"
                        class="inline-flex items-center text-sm font-semibold text-gray-700 underline hover:text-blue-600 dark:text-slate-200 dark:hover:text-white">
                        Tasks
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 w-3 h-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span
                            class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-slate-400">{{ $task->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex justify-between items-center mb-8">
            <h2 class="mb-4 text-3xl font-medium tracking-tight leading-none text-gray-900 md:text-4xl dark:text-white">
                {{ $task->title }}
            </h2>
            <div class="flex items-center">
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

                <a href="{{ route('tasks.edit', $task) }}">
                    <x-secondary-button class="!border-none !bg-transparent">
                        <span class="mr-2 material-symbols-outlined !shadow-none">
                            edit
                        </span>
                        Edit
                    </x-secondary-button>
                </a>
                <a href="{{ route('tasks.destroy', $task) }}" data-turbo-method="delete" data-turbo-confirm="Are you sure?">
                    <x-secondary-button class="!border-none !bg-transparent !text-red-400 !shadow-none">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </x-secondary-button>
                </a>

            </div>
        </div>
        <div>
            <div class="flex items-center mb-6 space-x-5 text-slate-600 dark:text-slate-400">
                <div class="flex items-center">
                    <span class="mr-2 material-symbols-outlined">
                        person
                    </span>
                    <span>
                        {{ $task->user->name }}
                    </span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2 material-symbols-outlined">
                        schedule
                    </span>
                    <span>
                        {{ $task->created_at->diffForHumans() }}
                    </span>
                </div>
                <div class="{{ $task->status->classes() }}">
                    {{ $task->status->label() }}
                </div>
            </div>
            <div class="prose prose-slate md:prose-lg dark:prose-invert">
                {!! $task->description !!}
            </div>
        </div>
    </section>
@endsection
