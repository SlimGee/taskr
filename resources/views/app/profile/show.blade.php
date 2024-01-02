@extends('dash')

@section('title', 'Profile')


@section('content')
    <section class="container px-4 mx-auto md:px-8">
        <div class="flex items-baseline pt-8 pb-8">
            <div class="flex-1">
                <h1 class="text-4xl font-medium dark:text-white text-slate-900">Profile</h1>
                <p class="mt-3 mb-4 text-lg font-normal text-slate-500 dark:text-slate-400">
                    Update your profile and password information.
                </p>
            </div>
        </div>

        <div class="pt-10 mx-auto w-8/12">
            <div class="space-y-12">
                <div class="pb-12 border-b border-gray-900/10 dark:border-slate-700">

                    <h2 class="text-base font-semibold leading-7 dark:text-white text-slate-900">Profile
                        Information</h2>
                    <p class="mt-1 text-sm leading-6 text-slate-600 dark:text-slate-400">
                        This information will be
                        displayed publicly so be
                        careful what you share.
                    </p>

                    <div class="mt-10 sm:mt-5">

                        <form action="{{ route('user-profile-information.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="overflow-hidden">

                                <div class="py-5 bg-white dark:bg-slate-800">

                                    <div class="grid grid-cols-6 gap-6 mb-5">
                                        <div class="col-span-6 sm:col-span-3">
                                            <x-form.label for="first-name"
                                                class="block text-sm font-medium text-gray-700">Name</x-form.label>
                                            <x-form.input class='mt-1 w-full' name="name" id="name" error="name"
                                                bag="updateProfileInformation" :value="old('name', $user->name)" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <x-form.label for="email-address"
                                                class="block text-sm font-medium text-gray-700">Email
                                                address
                                            </x-form.label>
                                            <x-form.input class='mt-1 w-full' name="email" type='email' id="name"
                                                error="email" bag="updateProfileInformation" :value="old('email', $user->email)" />
                                        </div>
                                    </div>

                                </div>

                                <div class="py-3 px-4 text-right sm:px-6">
                                    <x-button type='submit'>
                                        Save Changes
                                    </x-button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="pb-12">

                    <h2 class="text-base font-semibold leading-7 dark:text-white text-slate-900">Password</h2>
                    <p class="mt-1 text-sm leading-6 text-slate-600 dark:text-slate-400">
                        Use a long, random password to stay secure.
                    </p>



                    <div class="mt-10 sm:mt-5">

                        <div class="mt-5">

                            <form action="{{ route('user-password.update') }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="overflow-hidden">
                                    <div class="grid grid-cols-12 space-y-6 bg-white dark:bg-slate-800">
                                        <div class="col-span-8">
                                            <x-form.label for="current-password">
                                                Current password
                                            </x-form.label>
                                            <x-form.input class='mt-1 w-full' name="current_password" id="current_password"
                                                error="current_password" bag="updatePassword" type="password" />
                                        </div>

                                        <div class="col-span-12 mr-0 sm:col-span-6 sm:mr-3">
                                            <x-form.label for="password">New
                                                password</x-form.label>
                                            <x-form.input class='mt-1 w-full' name="password" id="password"
                                                error="password" bag="updatePassword" type='password' />
                                        </div>

                                        <div class="col-span-12 ml-0 sm:col-span-6 sm:ml-3">
                                            <x-form.label for="confirm-password">
                                                Confirm
                                                password
                                            </x-form.label>
                                            <x-form.input class='mt-1 w-full' name="password_confirmation"
                                                id="password_confirmation" error="password_confirmation"
                                                bag="updatePassword" type="password" />
                                        </div>
                                    </div>

                                    <div class="py-3 px-4 text-right sm:px-6">
                                        <x-button type='submit'>
                                            Save Password
                                        </x-button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
