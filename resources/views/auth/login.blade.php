@extends('app')

@section('content')
    <div class="w-full h-[90vh]">
        <div class="flex justify-center items-center h-full">
            <div class="flex py-10 px-4 mx-auto w-full h-full md:px-10 md:w-1/2">
                <div class='mx-auto w-full bg-white md:w-1/2 dark:bg-slate-800'>

                    <p tabindex="0"
                        class="text-2xl font-extrabold leading-6 focus:outline-none text-slate-800 dark:text-slate-100">
                        Login to your account
                    </p>

                    <p tabindex="0"
                        class="mt-5 text-sm font-medium leading-none focus:outline-none text-slate-500 dark:text-slate-400">
                        Don't have account?
                        <a href="{{ route('register') }}"
                            class="ml-1 text-sm font-bold leading-none cursor-pointer focus:underline focus:outline-none text-slate-800 dark:text-slate-100 hover:text-blue-accent-400 focus:text-blue-accent-400">
                            Sign up here
                        </a>
                    </p>
                    <a href='{{ route('socialite.redirect', 'google') }}'>
                        <x-secondary-button aria-label="Continue with google" class="justify-center mt-5 w-full">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/sign_in-svg2.svg" alt="google">
                            <p class="ml-4 text-base font-medium text-slate-700 dark:text-slate-200">
                                Continue with Google
                            </p>
                        </x-secondary-button>
                    </a>

                    <div class="flex justify-between items-center py-5 w-full">
                        <div class="w-full h-0.5 bg-slate-400 dark:bg-slate-700"></div>
                        <p class="px-2.5 text-base font-medium leading-4 text-slate-400 dark:text-slate-200">OR</p>
                        <div class="w-full h-0.5 bg-slate-400 dark:bg-slate-700"></div>
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <x-form.label for="email">
                                Email
                            </x-form.label>

                            <x-form.input name="email" type="email" class="mt-1 w-full" placeholder="email@example.com"
                                error='email' />
                        </div>
                        <div class="mt-3 w-full">
                            <x-form.label for="password">
                                Password
                            </x-form.label>

                            <x-form.input name="password" class="mt-1 w-full" type="password" error='password' />
                        </div>
                        <div class='mt-3'>
                            <input type="checkbox" name="remember" id="remember"
                                class="mr-2 rounded dark:bg-slate-800 dark:border-slate-700" />
                            <label for='remember'
                                class="text-sm font-medium leading-none text-slate-800 dark:text-slate-100">
                                Remember
                                me
                            </label>
                        </div>
                        <div class="mt-4">
                            <x-button type="submit" class="justify-center w-full">
                                Login
                            </x-button>
                        </div>
                        <div>
                            <p tabindex="0"
                                class="mt-5 text-sm font-medium leading-none focus:outline-none text-slate-500 dark:text-slate-400">
                                Forgot password?
                                <a href="{{ route('password.request') }}"
                                    class="ml-1 text-sm font-medium leading-none cursor-pointer focus:underline focus:outline-none text-slate-800 dark:text-slate-100 hover:text-blue-accent-400 focus:text-blue-accent-400">
                                    Reset your password here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
