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
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
                                alt="user photo" />
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
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm dark:text-slate-400 dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100">Account
                                        settings</a>
                                </li>
                            </ul>

                            <ul class="py-1 text-slate-700 dark:text-slate-300" aria-labelledby="dropdown">
                                <li>
                                    <a href="#"
                                        class="flex items-center py-2 px-4 text-sm dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100"><svg
                                            class="mr-2 w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        My likes</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center py-2 px-4 text-sm dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100"><svg
                                            class="mr-2 w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                            </path>
                                        </svg>
                                        Collections</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex justify-between items-center py-2 px-4 text-sm dark:hover:bg-slate-600 dark:hover:text-white hover:bg-slate-100">
                                        <span class="flex items-center">
                                            <svg aria-hidden="true"
                                                class="mr-2 w-5 h-5 text-primary-600 dark:text-primary-500"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Pro version
                                        </span>
                                        <svg aria-hidden="true" class="w-5 h-5 text-slate-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
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
                        <a href="{{ route('home') }}"
                            class="flex items-center p-2 text-base font-medium rounded-lg dark:text-white text-slate-900 group dark:hover:bg-slate-700 hover:bg-slate-100">


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
