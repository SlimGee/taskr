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
                        <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-slate-400">New task</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex justify-between items-baseline mb-8">
            <h2 class="mb-4 text-3xl font-medium tracking-tight leading-none text-gray-900 md:text-4xl dark:text-white">
                Create task
            </h2>
        </div>


        <div class="">
            <div class="w-5/12">
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <x-form.label for="title">
                            Title
                        </x-form.label>

                        <x-form.input name="title" class="mt-1 w-full" placeholder="Do the thing" :value="old('title')"
                            error='title' />
                    </div>

                    <div class="mb-3">
                        <x-form.label for="description" class="mb-1">
                            Description
                        </x-form.label>
                        <x-form.textarea name="description" class="hidden mt-1 w-full" data-controller="milkdown"
                            error="description">{{ old('description') }}</x-form.textarea>

                        <span class="mt-1 italic font-medium text-slate-600 dark:text-slate-300">
                            Markdown syntax is supported...
                        </span>
                    </div>

                    <div>
                        <x-button type="submit">Create task</x-button>
                    </div>


                </form>
            </div>
        </div>


    </section>
@endsection
