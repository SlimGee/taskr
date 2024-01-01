<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>


<body>
    @include('partials.flash')
    <div class="min-h-screen antialiased bg-slate-50 dark:bg-slate-800">
        <nav class="fixed top-0 right-0 left-0 z-50 py-2.5 px-4 bg-white shadow dark:bg-slate-800">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">
                    <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="p-2 mr-2 rounded-lg cursor-pointer md:hidden focus:ring-2 text-slate-600 dark:text-slate-400 dark:focus:bg-slate-700 dark:focus:ring-slate-700 dark:hover:bg-slate-700 dark:hover:text-white hover:text-slate-900 hover:bg-slate-100 focus:bg-slate-100 focus:ring-slate-100">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>
                    <a href="https://flowbite.com" class="flex justify-between items-center mr-4">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Taskr</span>
                    </a>

                </div>
                <div class="flex items-center lg:order-2">
                    <div class="inline relative" {{ stimulus_controller('dropdown') }}>
                        <button type="button" data-action="dropdown#toggle click@window->dropdown#hide"
                            class="flex items-center mx-3 space-x-3 text-sm font-semibold rounded-full md:mr-0 focus:ring-4 bg-slate-800 dark:text-slate-200 dark:focus:ring-slate-600 focus:ring-slate-300"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                            <span class="sr-only">Open user menu</span>
                            Hi, {{ auth()->user()->name }}
                        </button>


                        <div data-dropdown-target="menu"
                            class="hidden absolute right-0 z-10 m-2 w-56 rounded border ring-1 ring-indigo-500 ring-opacity-25 shadow-lg transition transform origin-top-right dark:border-slate-700 dark:bg-slate-800"
                            data-transition-enter-from="opacity-0 scale-95"
                            data-transition-enter-to="opacity-100 scale-100"
                            data-transition-leave-from="opacity-100 scale-100"
                            data-transition-leave-to="opacity-0 scale-95">

                            <div class="py-3 px-4">
                                <span class="block text-sm font-semibold dark:text-white text-slate-900">
                                    {{ auth()->user()->name }}
                                </span>
                                <span class="block text-sm dark:text-white text-slate-900 truncate">
                                    {{ auth()->user()->email }}
                                </span>
                            </div>

                            <ul class="py-1 text-slate-700 dark:text-slate-300" aria-labelledby="dropdown">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm dark:text-slate-400 dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100">My
                                        profile</a>
                                </li>

                            </ul>

                            <ul class="pt-1 text-slate-700 dark:text-slate-300" aria-labelledby="dropdown">
                                <li>
                                    <a href="{{ route('logout') }}" data-turbo-method="post"
                                        class="block py-2 px-4 text-sm dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100">
                                        Sign out
                                    </a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>
        </nav>

        <!-- Sidebar -->

        <aside
            class="fixed top-0 left-0 z-40 pt-14 w-64 h-screen bg-white border-r transition-transform -translate-x-full md:translate-x-0 border-slate-200 dark:bg-slate-800 dark:border-slate-700"
            aria-label="Sidenav" id="drawer-navigation">
            <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-slate-800">

                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}"
                            class="flex items-center p-2 text-base font-medium rounded-lg dark:text-white text-slate-900 group dark:hover:bg-slate-700 hover:bg-slate-100">

                            <span
                                class="transition duration-75 material-symbols-outlined text-slate-500 dark:text-slate-400 dark:group-hover:text-white group-hover:text-slate-900">
                                dashboard
                            </span>
                            <span class="ml-3">Dashboard</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tasks.index') }}" @class([
                            'dark:bg-slate-700 bg-slate-100' => Route::is('tasks.*'),
                            'flex items-center p-2 text-base font-medium rounded dark:text-white text-slate-900 group dark:hover:bg-slate-700 hover:bg-slate-100',
                        ])>
                            <span
                                class="transition duration-75 material-symbols-outlined text-slate-500 dark:text-slate-400 dark:group-hover:text-white group-hover:text-slate-900">
                                task
                            </span>
                            <span class="ml-3">Tasks</span>

                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-base font-medium rounded-lg transition duration-75 dark:text-white text-slate-900 group dark:hover:bg-slate-700 hover:bg-slate-100">
                            <span
                                class="transition duration-75 material-symbols-outlined text-slate-500 dark:text-slate-400 dark:group-hover:text-white group-hover:text-slate-900">
                                settings
                            </span>
                            <span class="ml-3">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>

        </aside>

        <main class="p-4 pt-20 h-auto md:ml-64">
            @yield('content')
        </main>


    </div>
</body>

</html>
